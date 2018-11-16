<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\SyncOneProductToES;
use App\Models\Category;
use App\Models\Product;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class ProductsController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('商品')
            ->description('列表')
            ->body($this->grid());
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('修改')
            ->description('商品')
            ->body($this->form($id)->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('添加')
            ->description('商品')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product);
        $grid->model()->with(['category'])->orderBy('id', 'desc');
        $grid->filter(function ($filter) {
            $filter->where(function ($query) {
                $query->where('title', 'like', "%{$this->input}%")
                    ->orWhere('long_title', 'like', "%{$this->input}%")
                    ->orWhere('description', 'like', "%{$this->input}%")
                    ->whereHas('category', function ($query) {
                        $query->where('name', 'like', "{$this->input}");
                    });
            }, '关键字');
        });

        $grid->id('ID');
        $grid->title('标题');
        $grid->image('封面图')->display(function () {
            return "<img width='50' src='$this->image_url'>";
        });
        $grid->column('category.name', '所属分类');
    
        $grid->on_sale('是否上架')->display(function ($on_sale) {
            return $on_sale ? '是' : '否';
        });

        $grid->column('pushs','是否推荐')->display(function ($push) {
            return $push ? '是' : '否';
        });
            
        $grid->rating('评分');
        $grid->sold_count('销量');
        $grid->review_count('评论数量');
        $grid->price('最低价');
        $grid->created_at('添加时间');
        $grid->updated_at('修改时间');


        $grid->disableRowSelector();
        $grid->actions(function ($actions) {
            $actions->disableView();
        });
        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form($id = 0)
    {
        $category_data = Category::all();
        $category_name = [];

        foreach ($category_data as $v) {
            $category_name[$v['id']] = $v->full_name;
        }

        $category_id = (int) ($id ? Product::find($id)->category_id : 0);

        $form = new Form(new Product);
        $form->text('title', '标题')->rules('required');
        $form->text('long_title', '长标题')->rules('required');
        $form->select('category_id', '所属分类')->options($category_name)->default($category_id)->rules('required');
        $form->image('image', '封面图')->rules('required|image');
        $form->simplemde('description', '详情')->rules('required');
        $form->radio('on_sale', '是否上架')->options([1 => '是', '0' => '否'])->default(1);

        $form->switch('pushs', '是否推荐')->options([1 => '是', '0' => '否'])->default(0);

        $form->tab('商品', function ($form) {

        })->tab('规格', function ($form) {
            $form->hasMany('product_sku', '商品规格', function (Form\NestedForm $form) {
                $form->text('title', '规格')->rules('required');
                $form->image('image', '规格图');
                $form->text('description', '简介')->rules('required');
                $form->decimal('price', '单价')->rules('required');
                $form->number('stock', '库存')->rules('required');
            });
        })->tab('属性', function ($form) {
            $form->hasMany('product_property', '商品属性', function (Form\NestedForm $form) {
                $form->text('name', '属性名')->rules('required');
                $form->text('value', '属性值')->rules('required');
            });
        });

        $form->tools(function (Form\Tools $tools) {
            $tools->disableDelete();
            $tools->disableView();
        });
        $form->footer(function ($footer) {
            $footer->disableViewCheck();
            $footer->disableEditingCheck();
        });

        $form->saving(function (Form $form) {
            $form->model()->price = collect($form->input('product_sku'))->where(Form::REMOVE_FLAG_NAME, 0)->min('price') ?: 0;
        });

        $form->saved(function (Form $form) {
            $product = $form->model();
            $this->dispatch(new SyncOneProductToES($product));
        });

        return $form;
    }
}
