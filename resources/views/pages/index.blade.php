@extends('layouts.app')

@section('title','首页')

@section('content')
    <!-- Main Container  -->
    <div class="main-container container">
        <div id="content">
            <div class="content-top-w">
                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 main-left">
                    <div class="module col1 hidden-sm hidden-xs"></div>
                </div>
                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 main-right">
                    <div class="slider-container row">

                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 col2">
                            <div class="module sohomepage-slider ">
                                <div class="yt-content-slider" data-rtl="yes" data-autoplay="no" data-autoheight="no"
                                     data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1"
                                     data-items_column0="1" data-items_column1="1" data-items_column2="1"
                                     data-items_column3="1" data-items_column4="1" data-arrows="no"
                                     data-pagination="yes"
                                     data-lazyload="yes" data-loop="no" data-hoverpause="yes">

                                    @if($focus)
                                        @foreach($focus as $focu)
                                            @if($focu->place === 0)
                                                <div class="yt-content-slide">
                                                    <a href="#"><img src="/image/catalog/slideshow/home1/slider-1.jpg"
                                                                     alt="slider1"
                                                                     class="img-responsive"></a>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif

                                </div>

                                <div class="loadeding"></div>
                            </div>

                        </div>


                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 col3">
                            <div class="module product-simple extra-layout1">
                                <h3 class="modtitle">
                                    <span>最畅销</span>
                                </h3>
                                <div class="modcontent">
                                    <div id="so_extra_slider_1" class="so-extraslider">
                                        <!-- Begin extraslider-inner -->
                                        <div class="yt-content-slider extraslider-inner" data-rtl="yes"
                                             data-pagination="yes" data-autoplay="no" data-delay="4" data-speed="0.6"
                                             data-margin="0" data-items_column00="1" data-items_column0="1"
                                             data-items_column1="1" data-items_column2="1" data-items_column3="1"
                                             data-items_column4="1" data-arrows="no" data-lazyload="yes" data-loop="no"
                                             data-buttonpage="top">
                                            <div class="item ">

                                                @foreach($sold_count as $k=>$sold)
                                                    @if($k<=3)
                                                        <div class="product-layout item-inner style1 ">
                                                            <div class="item-image">
                                                                <div class="item-img-info">
                                                                    <a href="{{ route('products.show',['product'=>$sold->id]) }}"
                                                                       target="_self" title="Mandouille short ">
                                                                        <img src="{{ $sold->image_url }}"
                                                                             alt="{{ $sold->title }}">
                                                                    </a>
                                                                </div>

                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-title">
                                                                    <a href="{{ route('products.show',['product'=>$sold->id]) }}"
                                                                       target="_self"
                                                                       title="{{ $sold->title }} short">{{ str_limit($sold->title,15) }}</a>
                                                                </div>
                                                                <div class="rating">
                                                                    @for($i=1;$i<=floor($sold->rating);$i++)
                                                                        <span class="fa fa-stack"><i
                                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                                    @endfor
                                                                    {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>--}}
                                                                </div>
                                                                <div class="content_price price">
                                                                    <span class="price-new product-price">${{ $sold->price }} </span>&nbsp;&nbsp;

                                                                    <span class="price-old">${{ $sold->price+200 }}</span>&nbsp;

                                                                </div>
                                                            </div>
                                                            <!-- End item-info -->
                                                            <!-- End item-wrap-inner -->
                                                        </div>
                                                @endif
                                            @endforeach
                                            <!-- End item-wrap -->
                                            </div>

                                            <div class="item ">

                                                @foreach($sold_count as $k=>$sold)
                                                    @if($k>3)
                                                        <div class="product-layout item-inner style1 ">
                                                            <div class="item-image">
                                                                <div class="item-img-info">
                                                                    <a href="{{ route('products.show',['product'=>$sold->id]) }}"
                                                                       target="_self" title="Mandouille short ">
                                                                        <img src="{{ $sold->image_url }}"
                                                                             alt="{{ $sold->title }}">
                                                                    </a>
                                                                </div>

                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-title">
                                                                    <a href="{{ route('products.show',['product'=>$sold->id]) }}"
                                                                       target="_self"
                                                                       title="{{ $sold->title }} short">{{ str_limit($sold->title,15) }}</a>
                                                                </div>
                                                                <div class="rating">
                                                                    @for($i=1;$i<=floor($sold->rating);$i++)
                                                                        <span class="fa fa-stack"><i
                                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                                    @endfor
                                                                    {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>--}}
                                                                </div>
                                                                <div class="content_price price">
                                                                    <span class="price-new product-price">${{ $sold->price }} </span>&nbsp;&nbsp;

                                                                    <span class="price-old">${{ $sold->price+200 }}</span>&nbsp;

                                                                </div>
                                                            </div>
                                                            <!-- End item-info -->
                                                            <!-- End item-wrap-inner -->
                                                        </div>
                                                @endif
                                            @endforeach
                                            <!-- End item-wrap -->
                                            </div>
                                            <!--End extraslider-inner -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row content-main-w">

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 main-left">

                        <div class="module">
                            <div class="banners banners2">
                                @if($focus)
                                    @foreach($focus as $focu)
                                        @if($focu->place === 2)
                                            <div class="banner">
                                                <a href="{{ $focu->url }}"><img src="{{ $focu->image }}"
                                                                                alt="{{ $focu->alt }}"></a>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif

                            </div>
                        </div>

                        <div class="module product-simple extra-layout1">
                            <h3 class="modtitle">
                                <span>最新产品</span>
                            </h3>
                            <div class="modcontent">
                                <div id="so_extra_slider_1" class="so-extraslider">
                                    <!-- Begin extraslider-inner -->
                                    <div class="yt-content-slider extraslider-inner" data-rtl="yes"
                                         data-pagination="yes"
                                         data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="0"
                                         data-items_column00="1" data-items_column0="1" data-items_column1="1"
                                         data-items_column2="1" data-items_column3="1" data-items_column4="1"
                                         data-arrows="no" data-lazyload="yes" data-loop="no" data-buttonpage="top">
                                        <div class="item ">
                                            @foreach($desc as $k => $d)
                                                @if($k<=3)
                                                    <div class="product-layout item-inner style1 ">
                                                        <div class="item-image">
                                                            <div class="item-img-info">
                                                                <a href="{{ route('products.show',['product'=>$d->id]) }}"
                                                                   target="_self" title="{{ $d->title }} "><img
                                                                            src="{{ $d->image_url }}"
                                                                            alt="{{ $d->title }}"></a>
                                                            </div>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-title">
                                                                <a href="{{ route('products.show',['product'=>$d->id]) }}"
                                                                   target="_self"
                                                                   title="{{ $d->title }}">{{ str_limit($d->title,15) }}</a>
                                                            </div>
                                                            <div class="rating">
                                                                @for($i=1;$i<=floor($d->rating);$i++)
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                @endfor

                                                                {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>--}}
                                                            </div>
                                                            <div class="content_price price">
                                                                <span class="price-new product-price">${{ $d->price }}</span>&nbsp;&nbsp;

                                                                <span class="price-old">${{ $d->price+200 }}</span>&nbsp;

                                                            </div>
                                                        </div>
                                                        <!-- End item-info -->
                                                        <!-- End item-wrap-inner -->
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="item ">
                                            @foreach($desc as $k => $d)
                                                @if($k>3)
                                                    <div class="product-layout item-inner style1 ">
                                                        <div class="item-image">
                                                            <div class="item-img-info">
                                                                <a href="{{ route('products.show',['product'=>$d->id]) }}"
                                                                   target="_self" title="{{ $d->title }} "><img
                                                                            src="{{ $d->image_url }}"
                                                                            alt="{{ $d->title }}"></a>
                                                            </div>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-title">
                                                                <a href="{{ route('products.show',['product'=>$d->id]) }}"
                                                                   target="_self"
                                                                   title="{{ $d->title }}">{{ str_limit($d->title,15) }}</a>
                                                            </div>
                                                            <div class="rating">
                                                                @for($i=1;$i<=floor($d->rating);$i++)
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                @endfor

                                                                {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>--}}
                                                            </div>
                                                            <div class="content_price price">
                                                                <span class="price-new product-price">${{ $d->price }}</span>&nbsp;&nbsp;

                                                                <span class="price-old">${{ $d->price+200 }}</span>&nbsp;

                                                            </div>
                                                        </div>
                                                        <!-- End item-info -->
                                                        <!-- End item-wrap-inner -->
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <!--End extraslider-inner -->
                                </div>
                            </div>
                        </div>

                        <div class="module">
                            <div class="policy-w">
                                <a href="#"><img src="/image/catalog/banners/call-us.jpg" alt="image"></a>
                                <ul class="block-infos">
                                    <li class="info1">
                                        <div class="inner">
                                            <i class="fa fa-file-text-o"></i>
                                            <div class="info-cont">
                                                <a href="#">免费邮寄</a>
                                                <p>订单满 $49.86</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="info2">
                                        <div class="inner">
                                            <i class="fa fa-shield"></i>
                                            <div class="info-cont">
                                                <a href="#">订单保护</a>
                                                <p>安全信息</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="info3">
                                        <div class="inner">
                                            <i class="fa fa-gift"></i>
                                            <div class="info-cont">
                                                <a href="#">促销礼品</a>
                                                <p>特别优惠!</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="info4">
                                        <div class="inner">
                                            <i class="fa fa-money"></i>
                                            <div class="info-cont">
                                                <a href="#">退钱</a>
                                                <p>返回30天以上</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="module extra">
                            <h3 class="modtitle">
                                <span>推荐的</span>
                            </h3>
                            <div class="modcontent">
                                <div id="so_extra_slider_1" class="so-extraslider">
                                    <!-- Begin extraslider-inner -->
                                    <div class="products-list yt-content-slider extraslider-inner" data-rtl="yes"
                                         data-pagination="yes" data-autoplay="no" data-delay="4" data-speed="0.6"
                                         data-margin="0" data-items_column00="1" data-items_column0="1"
                                         data-items_column1="1" data-items_column2="1" data-items_column3="1"
                                         data-items_column4="1" data-arrows="no" data-lazyload="yes" data-loop="no"
                                         data-buttonpage="top">

                                        @foreach($products as $product)
                                            @if($product->pushs)
                                                <div class="item">
                                                    <div class="item-inner product-layout transition product-grid">
                                                        <div class="product-item-container">
                                                            <div class="left-block left-b">

                                                                <div class="product-image-container second_img">
                                                                    <a href="{{ route('products.show',['product'=>$product->id]) }}"
                                                                       target="_self"
                                                                       title="Duis aute irure ">
                                                                        <img src="{{ $product->image_url }}"
                                                                             class="img-1 img-responsive"
                                                                             alt="{{ $product->title }}">
                                                                        @foreach($product->product_sku as $skus)
                                                                            <img src="{{ $skus->image_url }}"
                                                                                 class="img-2 img-responsive"
                                                                                 alt="{{ $skus->image_url }}">
                                                                        @endforeach
                                                                    </a>
                                                                </div>
                                                                <!--quickview-->
                                                                <div class="so-quickview">
                                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                                       href="{{ route('products.detail',['product'=>$product->id]) }}"
                                                                       title="查看"
                                                                       data-fancybox-type="iframe"><i
                                                                                class="fa fa-eye"></i><span>查看</span></a>
                                                                </div>
                                                                <!--end quickview-->


                                                            </div>
                                                            <div class="right-block">

                                                                <div class="caption hide-cont">
                                                                    <div class="rating">
                                                                        @for($i=1;$i<=floor($product->rating);$i++)
                                                                            <span class="fa fa-stack"><i
                                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                        @endfor
                                                                    </div>
                                                                    <h4>
                                                                        <a href="{{ route('products.show',['product'=>$product->id]) }}"
                                                                           title="Pastrami bacon"
                                                                           target="_self">{{ str_limit($product->title,15) }}</a>
                                                                    </h4>

                                                                </div>
                                                                <p class="price">
                                                                    <span class="price-new">${{ $product->price}}</span>

                                                                </p>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                    <!--End extraslider-inner -->
                                </div>
                            </div>
                        </div>


                        <div class="module">
                            <div class="banners banners5">
                                @if($focus)
                                    @foreach($focus as $focu)
                                        @if($focu->place === 2)
                                            <div class="banner">
                                                <a href="{{ $focu->url }}"><img src="{{ $focu->image }}"
                                                                                alt="{{ $focu->alt }}"></a>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 main-right">


                        <div class="static-cates">
                            <ul>
                                @if($focus)
                                    @foreach($focus as $focu)
                                        @if($focu->place === 1)
                                            <li>
                                                <a href="{{ $focu->url }}"><img src="{{ $focu->image_url }}"
                                                                                alt="image"></a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        <!-- Deals -->
                        <div class="module deals-layout1">
                            <div class="head-title">
                                <div class="modtitle">
                                    <span>抢购</span>
                                    <div class="cslider-item-timer">
                                        <div class="product_time_maxprice">
                                            <div class="item-time">
                                                <div class="item-timer">
                                                    <div class="defaultCountdown-30"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a class="viewall" href="">查看全部</a>

                                </div>
                            </div>
                            <div class="modcontent">
                                <div id="so_deal_1" class="so-deal style1">
                                    <div class="extraslider-inner products-list yt-content-slider" data-rtl="yes"
                                         data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6"
                                         data-margin="30" data-items_column00="6" data-items_column0="5"
                                         data-items_column1="3" data-items_column2="2" data-items_column3="2"
                                         data-items_column4="1" data-arrows="yes" data-pagination="no"
                                         data-lazyload="yes"
                                         data-loop="yes" data-hoverpause="yes">

                                        <div class="item">
                                            <div class="item-inner product-layout transition product-grid">
                                                <div class="product-item-container">
                                                    <div class="left-block left-b">
                                                        <div class="box-label">
                                                            <span class="label-product label-sale">-11%</span>
                                                        </div>
                                                        <div class="product-image-container second_img">
                                                            <a href="product.html" target="_self"
                                                               title="Pastrami bacon">
                                                                <img src="/image/catalog/demo/product/270/h1.jpg"
                                                                     class="img-1 img-responsive"
                                                                     alt="image1">
                                                                <img src="/image/catalog/demo/product/270/h2.jpg"
                                                                     class="img-2 img-responsive"
                                                                     alt="image2">
                                                            </a>
                                                        </div>
                                                        <!--quickview-->
                                                        <div class="so-quickview">
                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                               href="quickview.html" title="Quick view"
                                                               data-fancybox-type="iframe"><i
                                                                        class="fa fa-eye"></i><span>Quick
                                                                    view</span></a>
                                                        </div>
                                                        <!--end quickview-->


                                                    </div>
                                                    <div class="right-block">

                                                        <div class="caption hide-cont">
                                                            <div class="ratings">
                                                                <div class="rating-box"> <span class="fa fa-stack"><i
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
                                                            <h4><a href="product.html" title="Pastrami bacon"
                                                                   target="_self">Pastrami
                                                                    bacon</a></h4>

                                                        </div>
                                                        <p class="price">
                                                            <span class="price-new">$85.00</span>
                                                            <span class="price-old">$96.00</span>
                                                        </p>
                                                    </div>

                                                    <div class="item-available">
                                                        <div class="available">
                                                            <span class="color_width" data-title="77%"
                                                                  data-toggle='tooltip'
                                                                  style="width: 77%"></span>
                                                        </div>
                                                        <p class="a2">Sold: <b>51</b></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Deals -->

                        <!-- Banners -->
                        <div class="banners3 banners">
                            @if($focus)
                                @foreach($focus as $focu)
                                    @if($focu->place === 3)
                                        <div class="item1">
                                            <a href="{{ $focu->url }}"><img src="{{ $focu->image }}"
                                                                            alt="{{ $focu->alt }}"></a>
                                        </div>
                                    @elseif($focu->place ===4)
                                        <div class="item2">
                                            <a href="{{ $focu->url }}"><img src="{{ $focu->image }}"
                                                                            alt="{{ $focu->alt }}"></a>
                                        </div>

                                    @elseif($focu->place===9)
                                        <div class="item3">
                                            <a href="{{ $focu->url }}"><img src="{{ $focu->image }}"
                                                                            alt="{{ $focu->alt }}"></a>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                        </div>
                        <!-- end Banners -->

                    @foreach($categoryTree as $category)

                        @if($category['order'])
                            <!-- Category Slider 1 -->
                                <div id="so_category_slider_1" style="padding:3px"
                                     @if($category['id']%2==0)
                                     class="so-category-slider container-slider module cateslider1"
                                     @else
                                     class="so-category-slider container-slider module cateslider2"
                                        @endif
                                >
                                    <div class="modcontent">
                                        <div class="page-top">
                                            <div class="page-title-categoryslider">{{ $category['name'] }}</div>
                                            <div class="item-sub-cat">
                                                <ul>

                                                    <li><a class="viewall" target="_self"
                                                           href="{{ route('products.index',['category_id'=>$category['id']]) }}">查看更多</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>

                                        <div class="categoryslider-content">
                                            <div class="item-cat-image" style="min-height: 351px;">
                                                <a href="#" title="Technology" target="_self">
                                                    <img class="categories-loadimage" alt="Technology"
                                                         src="image/catalog/demo/category/tab1.jpg">
                                                </a>
                                            </div>
                                            <div class="slider category-slider-inner products-list yt-content-slider"
                                                 data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4"
                                                 data-speed="0.6" data-margin="30" data-items_column00="4"
                                                 data-items_column0="4" data-items_column1="2" data-items_column2="1"
                                                 data-items_column3="2" data-items_column4="1" data-arrows="yes"
                                                 data-pagination="no" data-lazyload="yes" data-loop="yes"
                                                 data-hoverpause="yes">

                                                @foreach($category['children'] as $children)
                                                    @foreach($children['children'] as $child)
                                                        @foreach ($products as $product)

                                                            @if($product->category_id === $child['id'])
                                                                <div class="item">
                                                                    <div class="item-inner product-layout transition product-grid">
                                                                        <div class="product-item-container">
                                                                            <div class="left-block left-b">

                                                                                <div class="product-image-container second_img">
                                                                                    <a href="{{ route('products.show',['product'=>$product->id]) }}"
                                                                                       target="_self"
                                                                                       title="{{ $product->title }}">
                                                                                        <img src="{{ $product->image_url }}"
                                                                                             class="img-1 img-responsive"
                                                                                             alt="{{ $product->title }}">

                                                                                        @foreach($product->product_sku as $skus)
                                                                                            <img src="{{ $skus->image_url }}"
                                                                                                 class="img-2 img-responsive"
                                                                                                 alt="{{ $skus->image_url }}">
                                                                                        @endforeach
                                                                                    </a>
                                                                                </div>
                                                                                <!--quickview-->
                                                                                <div class="so-quickview">
                                                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                                                       href="{{ route('products.detail',['product'=>$product->id]) }}"
                                                                                       title="查看"
                                                                                       data-fancybox-type="iframe"><i
                                                                                                class="fa fa-eye"></i><span>查看</span></a>
                                                                                </div>
                                                                                <!--end quickview-->


                                                                            </div>
                                                                            <div class="right-block">

                                                                                <div class="caption hide-cont">
                                                                                    <div class="ratings">
                                                                                        <div class="rating-box">
                                                                                            @for($i=1;$i<=floor($product->rating);$i++)
                                                                                                <span class="fa fa-stack"><i
                                                                                                            class="fa fa-star fa-stack-2x"></i></span>
                                                                                            @endfor
                                                                                        </div>
                                                                                        <span class="rating-num">( {{ $product->review_count }}
                                                                                            )</span>
                                                                                    </div>
                                                                                    <h4>
                                                                                        <a href="{{ route('products.show',['product'=>$product->id]) }}"
                                                                                           title="{{ $product->title }}"
                                                                                           target="_self">{{ str_limit($product->title,20) }}</a>
                                                                                    </h4>

                                                                                </div>
                                                                                <p class="price">
                                                                                    <span class="price-new">${{ $product->price }}</span>

                                                                                </p>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach

                                                    @endforeach
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endif
                        <!-- end Category Slider 1 -->
                    @endforeach

                    <!-- Banners -->
                        <div class="banners4 banners">
                            <div class="row">
                                @if($focus)
                                    @foreach($focus as $focu)
                                        @if($focu->place === 6)
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <a href="{{ $focu->url }}"><img src="{{ $focu->image_url }}"
                                                                                alt="{{ $focu->image_alt }}"></a>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif

                            </div>
                        </div>
                        <!-- end Banners -->
                    </div>
                </div>
            </div>
        </div>
        <!-- //Main Container -->

@endsection