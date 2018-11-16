<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\ProductService;
use App\Services\SearchBuilders\ProductSearchBuilder;
use DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductsController extends Controller
{
    /*商品搜索页*/
    public function index(Request $request)
    {
        /**取出已上架的商品 */
        $page = $request->input('page', 1);
        $perPage = 15;

        $builder = (new ProductSearchBuilder())->onSale()->paginate($perPage, $page);

        /*关键字搜索*/
        if ($search = $request->input('search', '')) {
            /**array_filter 过滤空项 */
            $keywords = array_filter(explode(' ', $search));

            $builder->keywords($keywords);
        }

        /*分类查找*/
        if ($request->input('category_id') && $category = Category::find($request->input('category_id'))) {
            $builder->category($category);
        }

        /**分面搜索 */
        if ($search || isset($category)) {
            $builder->aggregateProperties();
        }

        /**属性筛选 */
        $propertyFilters = [];
        if ($filterString = $request->input('filters')) {
            $filterArray = explode('|', $filterString);
            foreach ($filterArray as $filter) {
                list($name, $value) = explode(':', $filter);
                $propertyFilters[$name] = $value;

                $builder->propertyFilter($name, $value);
            }
        }

        /*排序*/
        if ($order = $request->input('order', '')) {
            if (preg_match('/^(.+)_(asc|desc)$/', $order, $m)) {
                if (in_array($m[1], ['price', 'sold_count', 'rating'])) {

                    $builder->orderBy($m[1], $m[2]);
                }
            }
        }

        $result = app('es')->search($builder->getParams());

        $properties = [];

        /**如果有aggregations 表示分页搜索 */
        if (isset($result['aggregations'])) {
            $properties = collect($result['aggregations']['properties']['properties']['buckets'])
                ->map(function ($bucket) {
                    return [
                        'key' => $bucket['key'],
                        'values' => collect($bucket['value']['buckets'])->pluck('key')->all(),
                    ];
                })
                ->filter(function ($property) use ($propertyFilters) {
                    return count($property['values']) > 1 && !isset($propertyFilters[$property['key']]);
                });
        }

        $productIds = collect($result['hits']['hits'])->pluck('_id')->all();
        $products = Product::query()
            ->whereIn('id', $productIds)
            ->orderByRaw(DB::raw("FIND_IN_SET(id,'" . join(',', $productIds) . "'" . ')'))
            ->get();

        /**laravel 分页的底层 */
        $pager = new LengthAwarePaginator($products, $request['hits']['total'], $perPage, $page, [
            'path' => route('products.index', false),
        ]);

        return view('products.index', [
            'products' => $pager,
            'filters' => [
                'search' => $search,
                'order' => $order,
            ],
            'categorys' => $category ?? null,
            'properties' => $properties,
            'propertyFilters' => $propertyFilters,
        ]);
    }

    /*商品详情页*/
    public function show(Request $request, Product $product, ProductService $productService)
    {
        if (!$product->on_sale) {
            throw new InvalidRequestException('商品未上架');
        }

        $favored = false;

        if ($user = $request->user()) {
            $favored = $favor = boolval($user->favoriteProducts()->find($product->id));
        }

        $reviews = OrderItem::query()
            ->with('order.user', 'productSku')
            ->where('product_id', $product->id)
            ->whereNotNull('reviewed_at')
            ->orderBy('reviewed_at', 'desc')
            ->paginate(10);

        /*调用类查询相似*/
        $similarProductIds = $productService->getSimilarProductIds($product, 5);

        // 根据搜索出来的商品id 从数据库中读取商品数据
        $similarProducts = Product::query()
            ->whereIn('id', $similarProductIds)
            ->orderByRaw(sprintf("FIND_IN_SET(id,'%s')", join(',', $similarProductIds)))
            ->get();

        return view('products.show', [
            'product' => $product,
            'favored' => $favored,
            'reviews' => $reviews,
            'similar' => $similarProducts,
        ]);
    }

    /*收藏页*/
    public function favorites(Request $request)
    {
        $products = $request->user()->favoriteProducts()->paginate(10);
        return view('products.favorites', [
            'products' => $products,
        ]);
    }

    /*添加收藏*/
    public function favor(Product $product, Request $request)
    {
        $user = $request->user();
        if ($user->favoriteProducts()->find($product->id)) {
            return [];
        }

        /*attach() 方法将当前用户和此商品关联起来*/
        $user->favoriteProducts()->attach($product);

        return [];
    }

    /*取消收藏*/
    public function disfavor(Product $product, Request $request)
    {
        $user = $request->user();
        /*detach() 方法用于取消多对多的关联*/
        $user->favoriteProducts()->detach($product);
        return [];
    }

    public function detail(Request $request, Product $product)
    {
        if (!$product->on_sale) {
            throw new InvalidRequestException('商品未上架');
        }

        $favored = false;

        if ($user = $request->user()) {
            $favored = $favor = boolval($user->favoriteProducts()->find($product->id));
        }

        return view('products.detail', [
            'product' => $product,
            'favored' => $favored,
        ]);
    }
}
