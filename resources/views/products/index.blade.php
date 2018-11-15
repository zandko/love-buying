@extends('layouts.app')

@section('title','商品分类')

@section('content')

    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>

            <li><a href="{{ route('products.index') }}">全部结果</a></li>

            @if ($categorys)
                @foreach($categorys->ancestors as $ancestor)
                    <li>
                        <a href="{{ route('products.index', ['category_id' => $ancestor->id]) }}">{{ $ancestor->name }}</a>
                    </li>
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
                                        <a href="{{ route('products.index', ['category_id' => $category['id']]) }}"
                                           class="cutom-parent">{{ $category['name'] }}</a>
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
                                    @foreach($p_desc as $desc)
                                        <div class="product-layout item-inner style1">
                                            <div class="item-image">
                                                <div class="item-img-info">
                                                    <a href="{{ route('products.show',['product'=>$desc->id]) }}"
                                                       target="_self" title="{{ $desc->title }}">
                                                        <img src="{{ $desc->image_url }}"
                                                             alt="{{ $desc->title }}">
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="item-info" style="width:180%">
                                                <div class="item-title">
                                                    <a href="{{ route('products.show',['product'=>$desc->id]) }}"
                                                       target="_self"
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
                            @if($focus)
                                @foreach($focus as $focu)
                                    @if($focu->place===8)
                                        <a title="{{ $focuu->alt }}" href="{{ $focu->url }}">

                                            <img src="{{ $focu->image_url }}" alt="{{ $focu->alt }}">
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        </div>


                    </div>
                </div>
            </aside>
            <!--Left Part End -->

            <!--Middle Part Start-->
            <div id="content" class="col-md-9 col-sm-8">
                <div class="products-category">
                    <h3 class="title-category ">季节广告</h3>
                    <div class="category-desc">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="banners">
                                    <div>
                                        @if($focus)
                                            @foreach($focus as $focu)
                                                @if($focu->place===7)
                                                    <a href="{{ $focu->url }}"><img src="{{ $focu->image_url }}"
                                                                                    alt="{{ $focu->alt }}"><br></a>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>


                        {{-- 属性搜索开始  --}}
                        <div class="row">
                            <div class="col-sm-12" style="margin-top: 20px">
                                @foreach($propertyFilters as $name => $value)
                                    <span class="filter">{{ $name }}:

                                    <span style="
                                        border: 1px solid #DDD;
                                        cursor: pointer;
                                        background: #f3f3f3;
                                        margin-right: 5px;
                                    " class="filter-value">{{ $value }}
                                        <a style="margin-left: 5px; color: red;font-size: 15px;" class="remove-filter" href="javascript: removeFilterFromQuery('{{ $name }}')">×</a>
                                    </span>

                                    </span>
                                @endforeach

                                <div style="border:1px solid #DDD;box-sizing: border-box;padding-left:15px;">
                                    @if ($categorys && $categorys->is_directory)
                                        <div class="row">
                                            <div style="background-color: #f3f3f3" class="col-xs-3 filter-key">子级分类：
                                            </div>
                                            <div class="col-xs-9 filter-values">
                                                @foreach($categorys->children as $child)
                                                    <a style="margin-right: 5px;"
                                                       href="{{ route('products.index', ['category_id' => $child->id]) }}">{{ $child->name }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @foreach($properties as $property)
                                    <div style="padding-left:15px;border-bottom:1px solid #DDD;border-right: 1px solid #DDD;border-left: 1px solid #DDD;box-sizing: border-box">
                                        <div class="row">
                                            <div style="background-color: #f3f3f3"
                                                 class="col-xs-3 filter-key">{{ $property['key'] }}：
                                            </div>
                                            <div class="col-xs-9 filter-values">
                                                @foreach($property['values'] as $value)
                                                    <a style="margin-right: 5px;" href="javascript: appendFilterToQuery('{{ $property['key'] }}','{{ $value }}')">{{ $value }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- 属性搜索结束 --}}
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
                                               href="{{ route('products.detail',['product'=>$product->id]) }}"
                                               title="Quick view" data-fancybox-type="iframe"><i
                                                        class="fa fa-eye"></i><span>Quick view</span></a>
                                        </div>
                                        <!--end quickview-->


                                    </div>
                                    <div class="right-block">

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

                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                               href="{{ route('products.detail',['product'=>$product->id]) }}"
                                               title="Quick view" data-fancybox-type="iframe"><i
                                                        class="fa fa-eye"></i></a>
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

    <script>
        /*解析地址栏参数*/
        function parseSearch() {
            var searches = {};

            location.search.substr(1).split('&').forEach(function (str) {
                var result = str.split('=');
                searches[decodeURIComponent(result[0])] = decodeURIComponent(result[1]);
            });

            return searches;
        }

        /*构建查询参数*/
        function buildSearch(searches) {
            var query = '?';

            _.forEach(searches, function (value, key) {
                query += encodeURIComponent(key) + '=' + encodeURIComponent(value) + '&';
            });

            return query.substr(0, query.length - 1);
        }

        /*将新的filter追加到当前的url上*/
        function appendFilterToQuery(name, value) {
            var searches = parseSearch();
            if (searches['filters']) {
                searches['filters'] += '|' + name + ':' + value;
            } else {
                searches['filters'] = name + ':' + value;
            }

            location.search = buildSearch(searches);
        }

        /*将某个filter移除*/
        function removeFilterFromQuery(name) {

            var searches = parseSearch();
            if (!searches['filters']) {
                return;
            }

            var filters = [];
            searches['filters'].split('|').forEach(function (filter) {

                var result = filter.split(':');

                if (result[0] === name) {
                    return;
                }

                filters.push(filter);
            });

            searches['filters'] = filters.join('|');
            location.search = buildSearch(searches);
        }
    </script>
@endsection