@extends('layouts.app')

@section('title','商品详情')

@section('content')

    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="#">{{ $product->category->name }}</a></li>
            <li><a href="#">{{ $product->long_title }}</a></li>

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
                                    @foreach($p_desc as $desc)
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

                            @if($focus)
                                @foreach($focus as $focu)
                                    @if($focu->place===8)
                                        <a title="{{ $focu->alt }}" href="{{ $focu->url }}">

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

                <div class="product-view row">
                    <div class="left-content-product">

                        <div class="content-product-left class-honizol col-md-5 col-sm-12 col-xs-12">
                            <div class="large-image  ">
                                <img itemprop="image" class="product-image-zoom"
                                     src="/image/catalog/demo/product/fashion/1.jpg" title="{{ $product->title }}"
                                     alt="Chicken swinesha">
                            </div>
                            <a class="thumb-video pull-left" href="http://www.iqiyi.com/w_19s1mp66o5.html"><i
                                        class="fa fa-youtube-play"></i></a>

                            <div id="thumb-slider" class="yt-content-slider full_slider owl-drag" data-rtl="yes"
                                 data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6"
                                 data-margin="10"
                                 data-items_column00="4" data-items_column0="4" data-items_column1="3"
                                 data-items_column2="4" data-items_column3="1" data-items_column4="1" data-arrows="yes"
                                 data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                <a data-index="0" class="img thumbnail"
                                   data-image="/image/catalog/demo/product/fashion/1.jpg" title="Chicken swinesha">
                                    <img src="{{ $product->image_url }}" title="{{ $product->title }}"
                                         alt="Chicken swinesha">
                                </a>

                                @foreach($product->product_sku as $k => $sku)
                                    <a data-index="{{$k}}" class="img thumbnail "
                                       data-image="/image/catalog/demo/product/fashion/2.jpg" title="Chicken swinesha">
                                        <img src="{{ $sku->image_url }}" title="{{ $sku->title }}"
                                             alt="Chicken swinesha">
                                    </a>
                                @endforeach
                            </div>

                        </div>

                        <div class="content-product-right col-md-7 col-sm-12 col-xs-12">
                            <div class="title-product">
                                <h1>{{ $product->long_title }}</h1>
                            </div>

                            <!-- Review ---->
                            <div class="box-review form-group">
                                <div class="ratings">
                                    <div class="rating-box">
                                        @for($i =1;$i<=floor($product->rating);$i++)
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                        @endfor
                                    </div>
                                </div>

                                <a class="reviews_button" href=""
                                   onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">{{ $product->review_count }}
                                    评论</a> |
    
                            </div>

                            <div class="product-label form-group">
                                <div class="product_page_price price" itemprop="offerDetails" itemscope=""
                                     itemtype="http://data-vocabulary.org/Offer">
                                    <span class="price-new price-news" itemprop="price">${{ $product->price }}</span>
                                    <span class="price-old price-olds">${{ $product->price + 200}}</span>
                                </div>
                                <div class="stock"><span>可用性:</span> <span class="status-stock">库存</span>
                                </div>
                            </div>

                            <div class="product-box-desc">
                                <div class="inner-box-desc">
                                    <div class="brand"><span>上架时间 :</span><a href="#">{{ $product->created_at    }}</a>
                                    </div>
                                    <div class="price-tax"><span>税前 :</span> <span
                                                class="min_price">${{ $product->price }}</span></div>
                                    <div class="model"><span>产品代码 :</span> {{ $product->id }}</div>
                                    <div class="model"><span>销量 :</span> {{ $product->sold_count }}</div>
                                </div>
                            </div>


                            <div id="product">
                                <h4>可用选项</h4>
                                <div class="image_option_type form-group required">
                                    <label class="control-label">规格</label>
                                    <ul class="product-options clearfix" id="input-option231">
                                        @foreach($product->product_sku as $sku)
                                            <li style="margin-right: 10px" class="radio">
                                                <label class="sku-btn"
                                                       data-price="{{ $sku->price }}"
                                                       data-stock="{{ $sku->stock }}"
                                                       data-toggle="tooltip"
                                                       title="{{ $sku->description }}"
                                                       data-image="{{$sku->image_url}}"
                                                       data-placement="bottom">
                                                    <input class="image_radio" type="radio" name="skus"
                                                           value="{{ $sku->id }}">
                                                    <img style="width: 50px" src="{{ $sku->image_url }}"
                                                         data-original-title="{{ $sku->description }}"> <i
                                                            class="fa fa-check"></i>
                                                    <label>{{ $sku->title }}</label>
                                                </label>
                                            </li>
                                        @endforeach
                                        {{--<li class="selected-option">--}}
                                        {{--</li>--}}
                                    </ul>
                                </div>

                                <div class="box-checkbox form-group required">
                                    <label class="control-label">库存</label>
                                    <div id="input-option232">
                                        <div class="checkbox">
                                            <span class="stock">{{ $product->stock }}</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group box-info-product">
                                    <div class="option quantity">
                                        <div class="input-group quantity-control cart_amount" unselectable="on"
                                             style="-webkit-user-select: none;">
                                            <label>数量</label>
                                            <input class="form-control" type="text" name="amount"
                                                   value="1">
                                            {{--<input type="hidden" name="product_id" value="50">--}}
                                            <span class="input-group-addon product_quantity_down">−</span>
                                            <span class="input-group-addon product_quantity_up">+</span>
                                        </div>
                                    </div>
                                    <div class="cart">
                                        <input type="button" data-toggle="tooltip" title="" value="添加到购物车"
                                               data-loading-text="Loading..." id="button-cart"
                                               class="btn btn-mega btn-lg"
                                    
                                               data-original-title="亲，您看要不加一下">
                                    </div>
                                    <div class="add-to-links wish_comp">
                                        <ul class="blank list-inline">
                                            <li class="wishlist">
                                                @if(!$favored)
                                                    <a class="icon btn-favor" data-toggle="tooltip" title=""
                                                      data-original-title="加入收藏"><i
                                                                class="fa fa-heart"></i>
                                                    </a>
                                                @else
                                                    <a style="background: crimson" class="icon btn-disfavor"
                                                       data-toggle="tooltip" title=""
                                                       data-original-title="取消收藏"><i
                                                                class="fa fa-heart"></i>
                                                    </a>
                                                @endif

                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>
                            <!-- end box info product -->

                        </div>

                    </div>
                </div>
                <!-- Product Tabs -->
                <div class="producttab ">
                    <div class="tabsslider  vertical-tabs col-xs-12">
                        <ul class="nav nav-tabs col-lg-2 col-sm-3">
                            <li class="active"><a data-toggle="tab" href="#tab-1">描述</a></li>
                            <li class="item_nonactive"><a data-toggle="tab" href="#tab-review">评论
                                    ({{ $product->review_count }})</a></li>
                            <li class="item_nonactive"><a data-toggle="tab" href="#tab-4">属性</a></li>
                        </ul>
                        <div class="tab-content col-lg-10 col-sm-9 col-xs-12">
                            <div id="tab-1" class="tab-pane fade active in">

                                {!!  $product->description !!}

                            </div>
                            <div id="tab-review" class="tab-pane fade">
                                <form>
                                    <div id="review">
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                            @foreach($reviews as $review)
                                                <tr>
                                                    <td style="width: 50%;">
                                                        <strong>{{$review->order->user->name}}</strong></td>
                                                    <td class="text-right">{{ $review->reviewed_at->format('Y-m-d H:i') }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>{{ $review->review }}</p>
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                @for($i=1;$i<=floor($review->rating);$i++)
                                                                <span class="fa fa-stack"><i
                                                                            class="fa fa-star fa-stack-1x"></i><i
                                                                            class="fa fa-star-o fa-stack-1x"></i></span>
                                                                @endfor
                                                                {{--<span class="fa fa-stack"><i--}}
                                                                            {{--class="fa fa-star fa-stack-1x"></i><i--}}
                                                                            {{--class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                                {{--<span class="fa fa-stack"><i--}}
                                                                            {{--class="fa fa-star fa-stack-1x"></i><i--}}
                                                                            {{--class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                                {{--<span class="fa fa-stack"><i--}}
                                                                            {{--class="fa fa-star fa-stack-1x"></i><i--}}
                                                                            {{--class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                                {{--<span class="fa fa-stack"><i--}}
                                                                            {{--class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="text-right"></div>
                                    </div>
                                    
                                </form>
                                <div>{{ $reviews->render() }}</div>
                            </div>
                            <div id="tab-4" class="tab-pane fade">
                                @foreach($product->grouped_properties as $name => $value)
                                    <ul>
                                        <li>{{ $name }} : {{ join(' ', $value) }}</li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //Product Tabs -->

                <!-- Related Products -->
                <div class="related titleLine products-list grid module ">
                    <h3 class="modtitle">猜您喜欢</h3>

                    <div class="releate-products yt-content-slider products-list" data-rtl="no" data-loop="yes"
                         data-autoplay="no" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6"
                         data-margin="30" data-items_column00="5" data-items_column0="5" data-items_column1="3"
                         data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes"
                         data-pagination="no" data-lazyload="yes" data-hoverpause="yes">
                        <div class="item">
                            <div class="item-inner product-layout transition product-grid">
                                <div class="product-item-container">
                                    <div class="left-block left-b">

                                        <div class="product-image-container second_img">
                                            <a href="product.html" target="_self" title="Lastrami bacon">
                                                <img src="/image/catalog/demo/product/270/e1.jpg"
                                                     class="img-1 img-responsive" alt="image1">
                                                <img src="/image/catalog/demo/product/270/e10.jpg"
                                                     class="img-2 img-responsive" alt="image2">
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
                                    
                                        <div class="caption hide-cont">
                                            <div class="ratings">
                                                <div class="rating-box"><span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                </div>
                                                <span class="rating-num">( 2 )</span>
                                            </div>
                                            <h4><a href="product.html" title="Pastrami bacon" target="_self">Lastrami
                                                    bacon</a></h4>

                                        </div>
                                        <p class="price">
                                            <span class="price-new">$80.00</span>

                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end Related  Products-->
            </div>

        </div>


    </div>
    <!--Middle Part End-->
    </div>
    <!-- //Main Container -->

@endsection

@section('scriptsAfterJs')

    <script>
        $(document).ready(function () {
            /*获取规格信息*/
            $('[data-toggle="tooltip"]').tooltip({trigger: 'hover'});
            $('.sku-btn').click(function () {
                $('.price-news').text($(this).data('price'));
                $('.price-olds').text($(this).data('price'));
                $('.min_price').text($(this).data('price'));
                $('.stock').text('库存：' + $(this).data('stock') + '件');
            });

            /*加入购物车*/
            $("#button-cart").click(function () {
                axios.post('{{ route('cart.store') }}', {
                    sku_id: $('li.active input[name=skus]').val(),
                    amount: $('.cart_amount input').val(),
                })
                    .then(function () {
                        swal('加入购物车成功', '', 'success');
                    }, function (error) {
                        if (error.response.status === 401) {
                            swal('请先登录', '', 'error');
                        } else if (error.response.status === 422) {
                            var html = '<div>';
                            _.each(error.response.data.errors, function (errors) {
                                _.each(errors, function (error) {
                                    html += error + '<br>';
                                })
                            });

                            html += '</div>';

                            swal({content: $(html)[0], icon: 'error'});
                        } else {
                            WW
                            swal('系统错误', '', 'error');
                        }
                    });
            });

            /*收藏*/
            $('.btn-favor').click(function () {
                axios.post('{{ route('products.favor', ['product' => $product->id]) }}')
                    .then(function () {
                        swal('操作成功', '', 'success')
                            .then(function () {
                                location.reload();
                            })
                    }, function (error) {
                        if (error.response && error.response.status === 401) {
                            swal('请先登录', '', 'error');
                        } else if (error.response && error.response.data.msg) {
                            swal(error.response.data.msg, '', 'error');
                        } else {
                            swal('系统错误', '', 'error');
                        }
                    });
            });

            /*取消收藏*/
            $('.btn-disfavor').click(function () {
                axios.delete('{{ route('products.disfavor', ['product' => $product->id]) }}')
                    .then(function () {
                        swal('操作成功', '', 'success')
                            .then(function () {
                                location.reload();
                            });
                    });
            });

        });
    </script>

@endsection