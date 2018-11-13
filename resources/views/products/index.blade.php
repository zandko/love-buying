@extends('layouts.app')

@section('title','商品分类')

@section('content')

    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>

            <li><a href="{{ route('products.index') }}">全部结果</a></li>

            @if ($category)
                @foreach($category->ancestors as $ancestor)
                    <li><a href="{{ route('products.index', ['category_id' => $ancestor->id]) }}">{{ $ancestor->name }}</a></li>
                @endforeach
            @endif
        </ul>

        <div class="row">
            <!--Left Part Start -->
            <aside class="col-sm-4 col-md-3 content-aside" id="column-left">
                <div class="module category-style">
                    <h3 class="modtitle">分类</h3>
                    <div class="modcontent">
                        <div class="box-category">
                            <ul id="cat_accordion" class="list-group">
                                @foreach($categoryTree as $category)
                                    <li class="hadchild">
                                        <a href="{{ route('products.index', ['category_id' => $category['id']]) }}" class="cutom-parent">{{ $category['name'] }}</a>
                                        <span class="button-view  fa fa-plus-square-o"></span>
                                        <ul style="display: block;">
                                            @foreach($category['children'] as $children)
                                                <li>
                                                    <a href="{{ route('products.index', ['category_id' => $children['id']]) }}">{{ $children['name'] }}</a>
                                                    <span class="button-view  fa fa-plus-square-o"></span>
                                                    <ul style="display:block">
                                                        @foreach($children['children'] as $child)
                                                            <li>
                                                                <a href="{{ route('products.index', ['category_id' => $child['id']]) }}">{{ $child['name'] }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                    </div>
                </div>
                <div class="module product-simple">
                    <h3 class="modtitle">
                        <span>最新产品</span>
                    </h3>
                    <div class="modcontent">
                        <div class="so-extraslider">
                            <!-- Begin extraslider-inner -->
                            <div class="yt-content-slider extraslider-inner">
                                <div class="item ">
                                    @foreach($product_desc as $desc)
                                        <div class="product-layout item-inner style1">
                                            <div class="item-image">
                                                <div class="item-img-info">
                                                    <a href="{{ route('products.show',['product'=>$desc->id]) }}" target="_self" title="{{ $desc->title }}">
                                                        <img src="{{ $desc->image_url }}"
                                                             alt="{{ $desc->title }}">
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="item-info" style="width:180%">
                                                <div class="item-title">
                                                    <a href="{{ route('products.show',['product'=>$desc->id]) }}" target="_self"
                                                       title="{{ $desc->title }}">{{ str_limit($desc->title,15) }}</a>
                                                </div>
                                                <div class="rating">
                                                    @for($i=1;$i<=floor($desc->rating);$i++)
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    @endfor

                                                    {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>--}}
                                                </div>
                                                <div class="content_price price">
                                                    <span class="price-new product-price">${{ $desc->price }}</span>&nbsp;&nbsp;

                                                    <span class="price-old">${{ $desc->price + 200 }} </span>&nbsp;

                                                </div>
                                            </div>
                                            <!-- End item-info -->
                                            <!-- End item-wrap-inner -->
                                        </div>
                                @endforeach
                                <!-- End item-wrap -->
                                </div>
                            </div>
                            <!--End extraslider-inner -->
                        </div>
                    </div>
                </div>
                <div class="module banner-left hidden-xs ">
                    <div class="banner-sidebar banners">
                        <div>
                            <a title="Banner Image" href="#">
                                <img src="/image/catalog/banners/banner-sidebar.jpg" alt="Banner Image">
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
            <!--Left Part End -->

            <!--Middle Part Start-->
            <div id="content" class="col-md-9 col-sm-8">
                <div class="products-category">
                    <h3 class="title-category ">Accessories</h3>
                    <div class="category-desc">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="banners">
                                    <div>
                                        <a href="#"><img src="/image/catalog/demo/category/img-cate.jpg" alt="img cate"><br></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Filters -->
                    <div class="product-filter product-filter-top filters-panel">
                        <div class="row">
                            <div class="col-md-5 col-sm-3 col-xs-12 view-mode">

                                <div class="list-view">
                                    <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"
                                            data-original-title="Grid"><i class="fa fa-th"></i></button>
                                    <button class="btn btn-default list" data-view="list" data-toggle="tooltip"
                                            data-original-title="List"><i class="fa fa-th-list"></i></button>
                                </div>

                            </div>
                            <form action="{{ route('products.index') }}" class="search-form">
                                <div class="short-by-show form-inline text-right col-md-7 col-sm-9 col-xs-12">
                                    <div class="form-group short-by">
                                        <label class="control-label" for="input-sort">排序方式:</label>
                                        <select id="input-sort" name="order" class="form-control">
                                            <option value="" selected="selected">默认排序</option>
                                            <option value="price_asc">价格从低到高</option>
                                            <option value="price_desc">价格从高到低</option>
                                            <option value="sold_count_desc">销量从高到低</option>
                                            <option value="sold_count_asc">销量从低到高</option>
                                            <option value="rating_desc">评价从高到低</option>
                                            <option value="rating_asc">评价从低到高</option>
                                        </select>

                                    </div>
                                </div>
                                <input type="hidden" name="search" value="{{ @$_GET['search'] }}">
                                <input type="hidden" name="category_id" value="{{ @$_GET['category_id'] }}">
                            </form>

                        </div>
                    </div>
                    <!-- //end Filters -->

                    <!--changed listings-->
                    <div class="products-list row nopadding-xs so-filter-gird">
                        @foreach($products as $product)
                            <div data-id="{{ $product->id }}"
                                 class="product-layout col-lg-15 col-md-4 col-sm-6 col-xs-12">
                                <div class="product-item-container">
                                    <div class="left-block left-b">

                                        <div class="product-image-container second_img">
                                            <a href="{{ route('products.show',['product'=>$product->id]) }}"
                                               target="_self" title="Lastrami bacon">
                                                <img src="{{ $product->image_url }}"
                                                     class="img-1 img-responsive" alt="image1">
                                                @foreach($product->product_sku as $sku_img)
                                                    <img src="{{ $sku_img->image_url }}"
                                                         class="img-2 img-responsive" alt="image2">
                                                @endforeach
                                            </a>
                                        </div>
                                        <!--quickview-->
                                        <div class="so-quickview">
                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                               href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i
                                                        class="fa fa-eye"></i><span>Quick view</span></a>
                                        </div>
                                        <!--end quickview-->


                                    </div>
                                    <div class="right-block">
                                        <div class="button-group so-quickview cartinfo--left">
                                            {{--<button type="button" class="addToCart" title="Add to cart"--}}
                                            {{--onclick="cart.add('60 ');">--}}
                                            {{--<span>添加到购物车</span>--}}
                                            {{--</button>--}}
                                            <a class="wishlist btn-button btn-favor" title="收藏商品"
                                               onclick="wishlist.add('60');"><i
                                                        class="fa fa-heart-o"></i><span>收藏商品</span>
                                            </a>
                                            {{--<button type="button" class="compare btn-button" title="Compare this Product "--}}
                                            {{--onclick="compare.add('60');"><i class="fa fa-retweet"></i><span>Compare this Product</span>--}}
                                            {{--</button>--}}


                                        </div>
                                        <div class="caption hide-cont">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    @for($i =1;$i<=floor($product->rating);$i++)
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    @endfor
                                                </div>
                                                <span class="rating-num">( {{ $product->review_count }} )</span>
                                            </div>
                                            <h4><a href="{{ route('products.show',['product'=>$product->id]) }}"
                                                   title="Pastrami bacon"
                                                   target="_self">{{ str_limit($product->title,20) }}</a></h4>

                                        </div>
                                        <p class="price">
                                            <span class="price-new">${{ $product->price }}</span>

                                        </p>
                                        <div class="description item-desc">
                                            <p>{{ $product->long_title }}</p>
                                        </div>
                                        <div class="list-block">
                                            {{--<button class="addToCart btn-button" type="button" title="Add to Cart"--}}
                                            {{--onclick="cart.add('101', '1');"><i--}}
                                            {{--class="fa fa-shopping-basket"></i>--}}
                                            {{--</button>--}}
                                            <a data-id="{{$product->id}}" class="wishlist btn-button btn-favor"
                                               title="收藏商品"
                                               onclick="wishlist.add('60');"><i
                                                        class="fa fa-heart-o"></i><span>收藏商品</span>
                                            </a>
                                        {{--<button class="compare btn-button" type="button"--}}
                                        {{--title="Compare this Product"--}}
                                        {{--onclick="compare.add('101');"><i class="fa fa-refresh"></i>--}}
                                        {{--</button>--}}
                                        <!--quickview-->
                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                               href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i
                                                        class="fa fa-eye"></i></a>
                                            <!--end quickview-->
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <input type="hidden" class="product_id" value="{{ $product->id }}">
                        @endforeach
                    </div>
                    <!--// End Changed listings-->
                    <!-- Filters -->
                    <div class="product-filter product-filter-bottom filters-panel">
                        <div class="row">
                            <div class="col-sm-6 text-left"></div>
                            <div class="col-sm-6 text-right">{{ $products->appends($filters)->render() }}</div>
                        </div>
                    </div>
                    <!-- //end Filters -->

                </div>

            </div>


            <!--Middle Part End-->
        </div>
    </div>
    <!-- //Main Container -->



@endsection

@section('scriptsAfterJs')
    <script type="text/javascript"><!--
        // Check if Cookie exists
        if ($.cookie('display')) {
            view = $.cookie('display');
        } else {
            view = 'grid';
        }
        if (view) display(view);
        //--></script>


    <script>
        var filters = {!! json_encode($filters) !!};
        $(document).ready(function () {
            /*地址栏参数*/
            $('.search-form select[name=order]').val(filters.order);

            /*排序*/
            $('.search-form select[name=order]').on('change', function () {
                $('.search-form').submit();
            });

        });
    </script>
@endsection