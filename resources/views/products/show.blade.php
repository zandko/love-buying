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
                    <h3 class="modtitle">Categories</h3>
                    <div class="modcontent">
                        <div class="box-category">
                            <ul id="cat_accordion" class="list-group">
                                <li class="hadchild"><a href="category.html" class="cutom-parent">Smartphone &
                                        Tablets</a>
                                    <span class="button-view  fa fa-plus-square-o"></span>
                                    <ul style="display: block;">
                                        <li><a href="category.html">Men's Watches</a></li>
                                        <li><a href="category.html">Women's Watches</a></li>
                                        <li><a href="category.html">Kids' Watches</a></li>
                                        <li><a href="category.html">Accessories</a></li>
                                    </ul>
                                </li>
                                <li class="hadchild"><a class="cutom-parent" href="category.html">Electronics</a> <span
                                            class="button-view  fa fa-plus-square-o"></span>
                                    <ul style="display: none;">
                                        <li><a href="category.html">Cycling</a></li>
                                        <li><a href="category.html">Running</a></li>
                                        <li><a href="category.html">Swimming</a></li>
                                        <li><a href="category.html">Football</a></li>
                                        <li><a href="category.html">Golf</a></li>
                                        <li><a href="category.html">Windsurfing</a></li>
                                    </ul>
                                </li>
                                <li class="hadchild"><a href="category.html" class="cutom-parent">Shoes</a> <span
                                            class="button-view  fa fa-plus-square-o"></span>
                                    <ul style="display: none;">
                                        <li><a href="category.html">Sub Categories</a></li>
                                        <li><a href="category.html">Sub Categories</a></li>
                                        <li><a href="category.html">Sub Categories</a></li>
                                        <li><a href="category.html">Sub Categories</a></li>
                                        <li><a href="category.html">Sub Categories</a></li>
                                    </ul>
                                </li>
                                <li class="hadchild"><a href="category.html" class="cutom-parent">Watches</a> <span
                                            class="button-view  fa fa-plus-square-o"></span>
                                    <ul style="display: none;">
                                        <li><a href="category.html">Men's Watches</a></li>
                                        <li><a href="category.html">Women's Watches</a></li>
                                        <li><a href="category.html">Kids' Watches</a></li>
                                        <li><a href="category.html">Accessories</a></li>
                                    </ul>
                                </li>
                                <li class="hadchild"><a href="category.html" class="cutom-parent">Jewellery</a> <span
                                            class="button-view  fa fa-plus-square-o"></span>
                                    <ul style="display: none;">
                                        <li><a href="category.html">Sub Categories</a></li>
                                        <li><a href="category.html">Sub Categories</a></li>
                                        <li><a href="category.html">Sub Categories</a></li>
                                        <li><a href="category.html">Sub Categories</a></li>
                                        <li><a href="category.html">Sub Categories</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href="category.html" class="cutom-parent">Health &amp; Beauty</a> <span
                                            class="dcjq-icon"></span></li>
                                <li class=""><a href="category.html" class="cutom-parent">Kids &amp; Babies</a> <span
                                            class="dcjq-icon"></span></li>
                                <li class=""><a href="category.html" class="cutom-parent">Sports</a> <span
                                            class="dcjq-icon"></span></li>
                                <li class=""><a href="category.html" class="cutom-parent">Home &amp; Garden</a><span
                                            class="dcjq-icon"></span></li>
                                <li class=""><a href="category.html" class="cutom-parent">Wines &amp; Spirits</a> <span
                                            class="dcjq-icon"></span></li>
                            </ul>
                        </div>


                    </div>
                </div>
                <div class="module product-simple">
                    <h3 class="modtitle">
                        <span>Latest products</span>
                    </h3>
                    <div class="modcontent">
                        <div class="so-extraslider">
                            <!-- Begin extraslider-inner -->
                            <div class=" extraslider-inner">
                                <div class="item ">
                                    <div class="product-layout item-inner style1 ">
                                        <div class="item-image">
                                            <div class="item-img-info">
                                                <a href="#" target="_self" title="Mandouille short ">
                                                    <img src="/image/catalog/demo/product/80/1.jpg"
                                                         alt="Mandouille short">
                                                </a>
                                            </div>

                                        </div>
                                        <div class="item-info">
                                            <div class="item-title">
                                                <a href="#" target="_self" title="Mandouille short">Mandouille
                                                    short </a>
                                            </div>
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i
                                                            class="fa fa-star-o fa-stack-2x"></i></span>
                                            </div>
                                            <div class="content_price price">
                                                <span class="price-new product-price">$55.00 </span>&nbsp;&nbsp;

                                                <span class="price-old">$76.00 </span>&nbsp;

                                            </div>
                                        </div>
                                        <!-- End item-info -->
                                        <!-- End item-wrap-inner -->
                                    </div>
                                    <!-- End item-wrap -->
                                    <div class="product-layout item-inner style1 ">
                                        <div class="item-image">
                                            <div class="item-img-info">
                                                <a href="#" target="_self" title="Xancetta bresao ">
                                                    <img src="/image/catalog/demo/product/80/2.jpg"
                                                         alt="Xancetta bresao">
                                                </a>
                                            </div>

                                        </div>
                                        <div class="item-info">
                                            <div class="item-title">
                                                <a href="#" target="_self" title="Xancetta bresao">
                                                    Xancetta bresao
                                                </a>
                                            </div>
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            </div>
                                            <div class="content_price price">
                                                <span class="price-new product-price">$80.00 </span>&nbsp;&nbsp;

                                                <span class="price-old">$89.00 </span>&nbsp;


                                            </div>
                                        </div>
                                        <!-- End item-info -->
                                        <!-- End item-wrap-inner -->
                                    </div>
                                    <!-- End item-wrap -->
                                    <div class="product-layout item-inner style1 ">
                                        <div class="item-image">
                                            <div class="item-img-info">
                                                <a href="#" target="_self" title="Sausage cowbee ">
                                                    <img src="/image/catalog/demo/product/80/3.jpg"
                                                         alt="Sausage cowbee">
                                                </a>
                                            </div>

                                        </div>
                                        <div class="item-info">
                                            <div class="item-title">
                                                <a href="#" target="_self" title="Sausage cowbee">
                                                    Sausage cowbee
                                                </a>
                                            </div>
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i
                                                            class="fa fa-star-o fa-stack-2x"></i></span>
                                            </div>

                                            <div class="content_price price">
                                                <span class="price product-price">
                                                                $66.00
                                                            </span>
                                            </div>
                                        </div>
                                        <!-- End item-info -->
                                        <!-- End item-wrap-inner -->
                                    </div>
                                    <!-- End item-wrap -->
                                    <div class="product-layout item-inner style1 ">
                                        <div class="item-image">
                                            <div class="item-img-info">
                                                <a href="#" target="_self" title="Chicken swinesha ">
                                                    <img src="/image/catalog/demo/product/80/4.jpg"
                                                         alt="Chicken swinesha">
                                                </a>
                                            </div>

                                        </div>
                                        <div class="item-info">
                                            <div class="item-title">
                                                <a href="#" target="_self" title="Chicken swinesha">
                                                    Chicken swinesha
                                                </a>
                                            </div>
                                            <div class="rating">
                                                <span class="fa fa-stack">
                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                </span>
                                                <span class="fa fa-stack">
                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                </span>
                                                <span class="fa fa-stack">
                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                </span>
                                                <span class="fa fa-stack">
                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                </span>
                                                <span class="fa fa-stack">
                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                </span>
                                            </div>
                                            <div class="content_price price">
                                                <span class="price-new product-price">$45.00 </span>&nbsp;&nbsp;

                                                <span class="price-old">$56.00 </span>&nbsp;


                                            </div>
                                        </div>
                                        <!-- End item-info -->
                                        <!-- End item-wrap-inner -->
                                    </div>
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

                <div class="product-view row">
                    <div class="left-content-product">

                        <div class="content-product-left class-honizol col-md-5 col-sm-12 col-xs-12">
                            <div class="large-image  ">
                                <img itemprop="image" class="product-image-zoom"
                                     src="/image/catalog/demo/product/fashion/1.jpg" title="{{ $product->title }}"
                                     alt="Chicken swinesha">
                            </div>
                            <a class="thumb-video pull-left" href="https://www.youtube.com/watch?v=HhabgvIIXik"><i
                                        class="fa fa-youtube-play"></i></a>

                            <div id="thumb-slider" class="yt-content-slider full_slider owl-drag" data-rtl="yes"
                                 data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6"
                                 data-margin="10"
                                 data-items_column00="4" data-items_column0="4" data-items_column1="3"
                                 data-items_column2="4" data-items_column3="1" data-items_column4="1" data-arrows="yes"
                                 data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                <a data-index="0" class="img thumbnail "
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
                                        {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                        {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                        {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                        {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                        {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                    </div>
                                </div>

                                <a class="reviews_button" href=""
                                   onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">{{ $product->review_count }}
                                    评论</a> |
                                <a class="write_review_button" href=""
                                   onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">写评论</a>
                            </div>

                            <div class="product-label form-group">
                                <div class="product_page_price price" itemprop="offerDetails" itemscope=""
                                     itemtype="http://data-vocabulary.org/Offer">
                                    <span class="price-new" itemprop="price">${{ $product->price }}</span>
                                    <span class="price-old">${{ $product->price + 200}}</span>
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
                                        <li class="selected-option">
                                        </li>
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
                                               onclick="cart.add('+{{ $product->id }}+', '','+{{ $product->image_url }}+','+{{ $product->title }}+');"
                                               data-original-title="亲，您看要不加一下">
                                    </div>
                                    <div class="add-to-links wish_comp">
                                        <ul class="blank list-inline">
                                            <li class="wishlist">
                                                <a class="icon" data-toggle="tooltip" title=""
                                                   onclick="wishlist.add('50');" data-original-title="加入收藏"><i
                                                            class="fa fa-heart"></i>
                                                </a>
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
                                            <tr>
                                                <td style="width: 50%;"><strong>超级管理员</strong></td>
                                                <td class="text-right">29/07/2015</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <p>最好的这款产品opencart</p>
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                                    class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="text-right"></div>
                                    </div>
                                    <h2 id="review-title">写评论</h2>
                                    <div class="contacts-form">
                                        <div class="form-group"><span class="icon icon-user"></span>
                                            <input type="text" name="name" class="form-control" value="Your Name"
                                                   onblur="if (this.value == '') {this.value = 'Your Name';}"
                                                   onfocus="if(this.value == 'Your Name') {this.value = '';}">
                                        </div>
                                        <div class="form-group"><span class="icon icon-bubbles-2"></span>
                                            <textarea class="form-control" name="text"
                                                      onblur="if (this.value == '') {this.value = 'Your Review';}"
                                                      onfocus="if(this.value == 'Your Review') {this.value = '';}">Your Review</textarea>
                                        </div>
                                        <span style="font-size: 11px;"><span class="text-danger">注意:</span>						 HTML未翻译！ 翻译！</span>

                                        <div class="form-group">
                                            <b>评级</b> <span>不好</span>&nbsp;
                                            <input type="radio" name="rating" value="1"> &nbsp;
                                            <input type="radio" name="rating"
                                                   value="2"> &nbsp;
                                            <input type="radio" name="rating"
                                                   value="3"> &nbsp;
                                            <input type="radio" name="rating"
                                                   value="4"> &nbsp;
                                            <input type="radio" name="rating"
                                                   value="5"> &nbsp;<span>好</span>

                                        </div>
                                        <div class="buttons clearfix"><a id="button-review"
                                                                         class="btn buttonGray">继续</a></div>
                                    </div>
                                </form>
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
                    <h3 class="modtitle">Related Products </h3>

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
                                        <div class="button-group so-quickview cartinfo--left">
                                            <button type="button" class="addToCart" title="Add to cart"
                                                    onclick="cart.add('60 ');">
                                                <span>Add to cart </span>
                                            </button>
                                            <button type="button" class="wishlist btn-button" title="Add to Wish List"
                                                    onclick="wishlist.add('60');"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
                                            </button>
                                            <button type="button" class="compare btn-button"
                                                    title="Compare this Product "
                                                    onclick="compare.add('60');"><i class="fa fa-retweet"></i><span>Compare this Product</span>
                                            </button>

                                        </div>
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

                        <div class="item">
                            <div class="item-inner product-layout transition product-grid">
                                <div class="product-item-container">
                                    <div class="left-block left-b">
                                        <div class="box-label">
                                            <span class="label-product label-sale">-15%</span>
                                        </div>
                                        <div class="product-image-container second_img">
                                            <a href="product.html" target="_self" title="Exceeur sint occaecat">
                                                <img src="/image/catalog/demo/product/270/e2.jpg"
                                                     class="img-1 img-responsive" alt="image1">
                                                <img src="/image/catalog/demo/product/270/e9.jpg"
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
                                        <div class="button-group so-quickview cartinfo--left">
                                            <button type="button" class="addToCart" title="Add to cart"
                                                    onclick="cart.add('60 ');">
                                                <span>Add to cart </span>
                                            </button>
                                            <button type="button" class="wishlist btn-button" title="Add to Wish List"
                                                    onclick="wishlist.add('60');"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
                                            </button>
                                            <button type="button" class="compare btn-button"
                                                    title="Compare this Product "
                                                    onclick="compare.add('60');"><i class="fa fa-retweet"></i><span>Compare this Product</span>
                                            </button>

                                        </div>
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
                                                <span class="rating-num">( 3 )</span>
                                            </div>
                                            <h4><a href="product.html" title="Pastrami bacon" target="_self">Exceeur
                                                    sint
                                                    occaecat</a></h4>

                                        </div>
                                        <p class="price">
                                            <span class="price-new">$50.00</span>
                                            <span class="price-old">$59.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="item-inner product-layout transition product-grid">
                                <div class="product-item-container">
                                    <div class="left-block left-b">

                                        <div class="product-image-container second_img">
                                            <a href="product.html" target="_self" title="Mapicola incidid">
                                                <img src="/image/catalog/demo/product/270/e3.jpg"
                                                     class="img-1 img-responsive" alt="image1">
                                                <img src="/image/catalog/demo/product/270/e8.jpg"
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
                                        <div class="button-group so-quickview cartinfo--left">
                                            <button type="button" class="addToCart" title="Add to cart"
                                                    onclick="cart.add('60 ');">
                                                <span>Add to cart </span>
                                            </button>
                                            <button type="button" class="wishlist btn-button" title="Add to Wish List"
                                                    onclick="wishlist.add('60');"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
                                            </button>
                                            <button type="button" class="compare btn-button"
                                                    title="Compare this Product "
                                                    onclick="compare.add('60');"><i class="fa fa-retweet"></i><span>Compare this Product</span>
                                            </button>

                                        </div>
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
                                                                class="fa fa-star-o fa-stack-2x"></i></span>
                                                </div>
                                                <span class="rating-num">( 5 )</span>
                                            </div>
                                            <h4><a href="product.html" title="Pastrami bacon" target="_self">Mapicola
                                                    incidid</a></h4>

                                        </div>
                                        <p class="price">
                                            <span class="price-new">$60.00</span>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="item-inner product-layout transition product-grid">
                                <div class="product-item-container">
                                    <div class="left-block left-b">
                                        <div class="box-label">
                                            <span class="label-product label-new">New</span>
                                        </div>
                                        <div class="product-image-container second_img">
                                            <a href="product.html" target="_self" title="Duis aute irure ">
                                                <img src="/image/catalog/demo/product/270/e4.jpg"
                                                     class="img-1 img-responsive" alt="image1">
                                                <img src="/image/catalog/demo/product/270/e7.jpg"
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
                                        <div class="button-group so-quickview cartinfo--left">
                                            <button type="button" class="addToCart" title="Add to cart"
                                                    onclick="cart.add('60 ');">
                                                <span>Add to cart </span>
                                            </button>
                                            <button type="button" class="wishlist btn-button" title="Add to Wish List"
                                                    onclick="wishlist.add('60');"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
                                            </button>
                                            <button type="button" class="compare btn-button"
                                                    title="Compare this Product "
                                                    onclick="compare.add('60');"><i class="fa fa-retweet"></i><span>Compare this Product</span>
                                            </button>

                                        </div>
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
                                            <h4><a href="product.html" title="Pastrami bacon" target="_self">Duis aute
                                                    irure </a></h4>

                                        </div>
                                        <p class="price">
                                            <span class="price-new">$48.00</span>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="item-inner product-layout transition product-grid">
                                <div class="product-item-container">
                                    <div class="left-block left-b">

                                        <div class="product-image-container second_img">
                                            <a href="product.html" target="_self" title="Excepteur sint occ">
                                                <img src="/image/catalog/demo/product/270/e5.jpg"
                                                     class="img-1 img-responsive" alt="image1">
                                                <img src="/image/catalog/demo/product/270/e6.jpg"
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
                                        <div class="button-group so-quickview cartinfo--left">
                                            <button type="button" class="addToCart" title="Add to cart"
                                                    onclick="cart.add('60 ');">
                                                <span>Add to cart </span>
                                            </button>
                                            <button type="button" class="wishlist btn-button" title="Add to Wish List"
                                                    onclick="wishlist.add('60');"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
                                            </button>
                                            <button type="button" class="compare btn-button"
                                                    title="Compare this Product "
                                                    onclick="compare.add('60');"><i class="fa fa-retweet"></i><span>Compare this Product</span>
                                            </button>

                                        </div>
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
                                                <span class="rating-num">( 4 )</span>
                                            </div>
                                            <h4><a href="product.html" title="Pastrami bacon" target="_self">Excepteur
                                                    sint
                                                    occ</a></h4>

                                        </div>
                                        <p class="price">
                                            <span class="price-new">$90.00</span>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="item-inner product-layout transition product-grid">
                                <div class="product-item-container">
                                    <div class="left-block left-b">

                                        <div class="product-image-container second_img">
                                            <a href="product.html" target="_self" title="PCenison meatloa">
                                                <img src="/image/catalog/demo/product/270/e6.jpg"
                                                     class="img-1 img-responsive" alt="image1">
                                                <img src="/image/catalog/demo/product/270/e2.jpg"
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
                                        <div class="button-group so-quickview cartinfo--left">
                                            <button type="button" class="addToCart" title="Add to cart"
                                                    onclick="cart.add('60 ');">
                                                <span>Add to cart </span>
                                            </button>
                                            <button type="button" class="wishlist btn-button" title="Add to Wish List"
                                                    onclick="wishlist.add('60');"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
                                            </button>
                                            <button type="button" class="compare btn-button"
                                                    title="Compare this Product "
                                                    onclick="compare.add('60');"><i class="fa fa-retweet"></i><span>Compare this Product</span>
                                            </button>

                                        </div>
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
                                                                class="fa fa-star-o fa-stack-2x"></i></span>
                                                </div>
                                                <span class="rating-num">( 6 )</span>
                                            </div>
                                            <h4><a href="product.html" title="Pastrami bacon" target="_self">Cenison
                                                    meatloa</a></h4>

                                        </div>
                                        <p class="price">$42.00</p>
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
                $('.price-new').text($(this).data('price'));
                $('.price-old').text($(this).data('price'));
                $('.min_price').text($(this).data('price'));
                $('.stock').text('库存：' + $(this).data('stock') + '件');
            });

            /*加入购物车*/
            $("#button-cart").click(function () {
                    axios.post('{{ route('cart.store') }}', {
                        sku_id: $('label.sku-btn input[name=skus]').val(),
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
                            swal('系统错误', '', 'error');
                        }
                    });
            });
        });
    </script>

@endsection