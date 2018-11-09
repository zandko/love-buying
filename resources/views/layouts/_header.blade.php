<!-- Header Container  -->
<header id="header" class=" typeheader-1">

    <!-- Header Top -->
    <div class="header-top hidden-compact">
        <div class="container">
            <div class="row">
                <div class="header-top-left col-lg-7 col-md-8 col-sm-6 col-xs-4">
                    <div class="hidden-md hidden-sm hidden-xs welcome-msg">Welcome to SuperMarket! Wrap new
                        offers / gift every single day on Weekends - New Coupon code: <span>Happy2018</span>
                    </div>
                    <ul class="top-link list-inline hidden-lg ">
                        <li class="account" id="my_account">
                            <a href="#" title="My Account " class="btn-xs dropdown-toggle" data-toggle="dropdown">
                                <span class="hidden-xs">My Account </span> <span class="fa fa-caret-down"></span>
                            </a>
                            <ul class="dropdown-menu ">
                                <li><a href="register.html"><i class="fa fa-user"></i> Register</a></li>
                                <li><a href="login.html"><i class="fa fa-pencil-square-o"></i> Login</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="header-top-right collapsed-block col-lg-5 col-md-4 col-sm-6 col-xs-8">
                    <ul class="top-link list-inline lang-curr">
                        <li class="currency">
                            <div class="btn-group currencies-block">
                                <form action="index.html" method="post" enctype="multipart/form-data" id="currency">
                                    <a class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                        <span class="icon icon-credit "></span> $ US Dollar <span
                                                class="fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu btn-xs">
                                        <li><a href="#">(€)&nbsp;Euro</a></li>
                                        <li><a href="#">(£)&nbsp;Pounds </a></li>
                                        <li><a href="#">($)&nbsp;US Dollar </a></li>
                                    </ul>
                                </form>
                            </div>
                        </li>
                        <li class="language">
                            <div class="btn-group languages-block ">
                                <form action="index.html" method="post" enctype="multipart/form-data" id="bt-language">
                                    <a class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                        <img src="/image/catalog/flags/gb.png" alt="English" title="English">
                                        <span class="">English</span>
                                        <span class="fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="index.html"><img class="image_flag"
                                                                      src="/image/catalog/flags/gb.png"
                                                                      alt="English" title="English"/> English </a></li>
                                        <li><a href=""> <img class="image_flag" src="/image/catalog/flags/ar.png"
                                                             alt="Arabic" title="Arabic"/> Arabic </a></li>
                                    </ul>
                                </form>
                            </div>

                        </li>
                    </ul>


                </div>
            </div>
        </div>
    </div>
    <!-- //Header Top -->

    <!-- Header center -->
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="navbar-logo col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <div class="logo"><a href="index.html"><img src="/image/catalog/logo.png" title="Your Store"
                                                                alt="Your Store"/></a></div>
                </div>
                <!-- //end Logo -->


                <!-- Search -->
                <div class="col-lg-7 col-md-6 col-sm-5">
                    <div class="search-header-w">
                        <div class="icon-search hidden-lg hidden-md hidden-sm"><i class="fa fa-search"></i></div>

                        <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
                            <form method="GET" action="index.html">
                                <div id="search0" class="search input-group form-group">
                                    <div class="select_category filter_type  icon-select hidden-sm hidden-xs">
                                        <select class="no-border" name="category_id">
                                            <option value="0">所有分类</option>
                                            <option value="78">Apparel</option>
                                            <option value="77">Cables &amp; Connectors</option>
                                            <option value="82">Cameras &amp; Photo</option>
                                            <option value="80">Flashlights &amp; Lamps</option>
                                            <option value="81">Mobile Accessories</option>
                                            <option value="79">Video Games</option>
                                            <option value="20">Jewelry &amp; Watches</option>
                                            <option value="76">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Earings</option>
                                            <option value="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wedding
                                                Rings
                                            </option>
                                            <option value="27">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Men Watches</option>
                                        </select>
                                    </div>

                                    <input class="autosearch-input form-control" type="text" value="" size="50"
                                           autocomplete="off" placeholder="Keyword here..." name="search">

                                    <button type="submit" class="button-search btn btn-primary" name="submit_search"><i
                                                class="fa fa-search"></i></button>

                                </div>
                                <input type="hidden" name="route" value="product/search"/>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- //end Search -->
                <div class="middle-right col-lg-3 col-md-3 col-sm-3">
                    <!--cart-->
                    <div class="shopping_cart">
                        <div id="cart" class="btn-shopping-cart">

                            <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle"
                               data-toggle="dropdown" aria-expanded="true">
                                <div class="shopcart">
                                            <span class="icon-c">
                                                <i class="fa fa-shopping-bag"></i>
                                            </span>
                                    <div class="shopcart-inner">
                                        <p class="text-shopping-cart">

                                            My cart
                                        </p>

                                        <span class="total-shopping-cart cart-total-full">
                                                    <span class="items_cart">02</span><span class="items_cart2">
                                                        item(s)</span><span class="items_carts">( $162.00 )</span>
                                                </span>
                                    </div>
                                </div>
                            </a>

                            <ul class="dropdown-menu pull-right shoppingcart-box" role="menu">
                                <li>
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td class="text-center" style="width:70px">
                                                <a href="product.html">
                                                    <img src="/image/catalog/demo/product/80/1.jpg" style="width:70px"
                                                         alt="Yutculpa ullamcon" title="Yutculpa ullamco"
                                                         class="preview">
                                                </a>
                                            </td>
                                            <td class="text-left"><a class="cart_product_name" href="product.html">Yutculpa
                                                    ullamco</a>
                                            </td>
                                            <td class="text-center">x1</td>
                                            <td class="text-center">$80.00</td>
                                            <td class="text-right">
                                                <a href="product.html" class="fa fa-edit"></a>
                                            </td>
                                            <td class="text-right">
                                                <a onclick="cart.remove('2');" class="fa fa-times fa-delete"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width:70px">
                                                <a href="product.html">
                                                    <img src="/image/catalog/demo/product/80/2.jpg" style="width:70px"
                                                         alt="Xancetta bresao" title="Xancetta bresao" class="preview">
                                                </a>
                                            </td>
                                            <td class="text-left"><a class="cart_product_name" href="product.html">Xancetta
                                                    bresao</a>
                                            </td>
                                            <td class="text-center">x1</td>
                                            <td class="text-center">$60.00</td>
                                            <td class="text-right">
                                                <a href="product.html" class="fa fa-edit"></a>
                                            </td>
                                            <td class="text-right">
                                                <a onclick="cart.remove('1');" class="fa fa-times fa-delete"></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </li>
                                <li>
                                    <div>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td class="text-left"><strong>Sub-Total</strong>
                                                </td>
                                                <td class="text-right">$140.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>Eco Tax (-2.00)</strong>
                                                </td>
                                                <td class="text-right">$2.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>VAT (20%)</strong>
                                                </td>
                                                <td class="text-right">$20.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>Total</strong>
                                                </td>
                                                <td class="text-right">$162.00</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <p class="text-right"><a class="btn view-cart" href="cart.html"><i
                                                        class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp;
                                            <a class="btn btn-mega checkout-cart" href="checkout.html"><i
                                                        class="fa fa-share"></i>Checkout</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!--//cart-->

                    <ul class="wishlist-comp hidden-md hidden-sm hidden-xs">
                        <li class="compare hidden-xs"><a href="#" class="top-link-compare" title="Compare "><i
                                        class="fa fa-refresh"></i></a>
                        </li>
                        <li class="wishlist hidden-xs"><a href="#" id="wishlist-total" class="top-link-wishlist"
                                                          title="Wish List (0) "><i class="fa fa-heart"></i></a>
                        </li>
                    </ul>


                </div>

            </div>

        </div>
    </div>
    <!-- //Header center -->

    <!-- Header Bottom -->
    <div class="header-bottom hidden-compact">
        <div class="container">
            <div class="row">

                <div class="bottom1 menu-vertical col-lg-2 col-md-3 col-sm-3">
                    <div class="responsive so-megamenu megamenu-style-dev ">
                        <div class="so-vertical-menu ">
                            <nav class="navbar-default">

                                <div class="container-megamenu vertical">
                                    <div id="menuHeading">
                                        <div class="megamenuToogle-wrapper">
                                            <div class="megamenuToogle-pattern">
                                                <div class="container">
                                                    <div>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                    所有分类
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="navbar-header">
                                        <button type="button" id="show-verticalmenu" data-toggle="collapse"
                                                class="navbar-toggle">
                                            <i class="fa fa-bars"></i>
                                            <span> 所有分类 </span>
                                        </button>
                                    </div>
                                    <div class="vertical-wrapper">
                                        <span id="remove-verticalmenu" class="fa fa-times"></span>
                                        <div class="megamenu-pattern">
                                            <div class="container-mega">
                                                <ul class="megamenu">
                                                    @if(isset($categoryTree))
                                                        @foreach($categoryTree as $category)
                                                    <li class="item-vertical  with-sub-menu hover">
                                                        <p class="close-menu"></p>
                                                        <a href="#" class="clearfix">
                                                            <img src="image/catalog/menu/icons/ico10.png" alt="icon">
                                                            <span>{{ $category['name'] }}</span>
                                                            <b class="fa-angle-right"></b>
                                                        </a>
                                                        <div class="sub-menu" data-subwidth="60"  >
                                                            <div class="content" >
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="row">
                                                                            @if(isset($category['children']) && count($category['children']) > 0)
                                                                            @foreach($category['children'] as $children)
                                                                            <div class="col-md-12 static-menu">
                                                                                <div class="menu">
                                                                                    <ul>
                                                                                        <li>
                                                                                            <ul>
                                                                                                @if(isset($children['children']))
                                                                                                    <li style="float: left;margin-right: 5px;"><a style="font-weight: bold;" href="#">{{ $children['name'] }} ></a></li>

                                                                                                @foreach($children['children'] as $child)
                                                                                                <li style="float: left;margin-right: 5px;"><a href="#" >{{ $child['name'] }}</a></li>
                                                                                                @endforeach
                                                                                                @endif
                                                                                            </ul>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                                @endforeach
                                                                            @endif

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                        @endforeach
                                                    @endif

                                                    <li class="loadmore">
                                                        <i class="fa fa-plus-square-o"></i>
                                                        <span class="more-view">More Categories</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>

                </div>

                <!-- Main menu -->
                <div class="main-menu-w col-lg-10 col-md-9">
                    <div class="responsive so-megamenu megamenu-style-dev">
                        <nav class="navbar-default">
                            <div class=" container-megamenu  horizontal open ">
                                <div class="navbar-header">
                                    <button type="button" id="show-megamenu" data-toggle="collapse"
                                            class="navbar-toggle">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="megamenu-wrapper">
                                    <span id="remove-megamenu" class="fa fa-times"></span>
                                    <div class="megamenu-pattern">
                                        <div class="container-mega">
                                            <ul class="megamenu" data-transition="slide" data-animationtime="250">
                                                <li class="home hover">
                                                    <a href="index.html">首页</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- //end Main menu -->

                <div class="bottom3">
                    <div class="telephone hidden-xs hidden-sm hidden-md">
                        <ul class="blank">
                            <li><a href="#"><i class="fa fa-truck"></i>追踪您的订单</a></li>
                            <li><a href="#"><i class="fa fa-phone-square"></i>热线 17805202450</a></li>
                        </ul>
                    </div>
                    <div class="signin-w hidden-md hidden-sm hidden-xs">
                        <ul class="signin-link blank">
                            <li class="log login">
                                @guest
                                    <i class="fa fa-lock"></i>
                                    <a class="link-lg" href="{{ route('login') }}">登录
                                    </a> or <a href="{{ route('register') }}">注册</a>
                                @else
                                    <a href="{{ route('user_addresses.index') }}">{{ Auth::user()->name }}</a>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                            退出
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                @endguest
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>
</header>
<!-- //Header Container  -->