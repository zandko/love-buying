<!-- Header Container  -->
<header id="header" class=" typeheader-1">

    <!-- Header Top -->
    <div class="header-top hidden-compact">
        <div class="container">
            <div class="row">
                <div class="header-top-left col-lg-7 col-md-8 col-sm-6 col-xs-4">
                    <div class="hidden-md hidden-sm hidden-xs welcome-msg">欢迎来到爱购物！在爱购物上每天都有新的优惠/礼物 - 新优惠券代码：Happy2018:
                        <span>Happy2018</span>
                    </div>
                    <ul class="top-link list-inline hidden-lg ">
                        <li class="account" id="my_account">
                            <a href="{{ route('user_addresses.index') }}" title="个人中心 " class="btn-xs dropdown-toggle"
                               data-toggle="dropdown">
                                <span class="hidden-xs">我的账户</span> <span class="fa fa-caret-down"></span>
                            </a>
                            <ul class="dropdown-menu ">
                                <li><a href="{{ route('register') }}"><i class="fa fa-user"></i> 注册</a></li>
                                <li><a href="{{ route('login') }}"><i class="fa fa-pencil-square-o"></i> 登录</a></li>
                            </ul>
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
                    <div class="logo"><a href="/"><img src="/image/catalog/logo.png" title="Your Store"
                                                                alt="Your Store"/></a></div>
                </div>
                <!-- //end Logo -->


                <!-- Search -->
                <div class="col-lg-7 col-md-6 col-sm-5">
                    <div class="search-header-w">
                        <div class="icon-search hidden-lg hidden-md hidden-sm"><i class="fa fa-search"></i></div>

                        <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
                            <form class="search-form" action="{{ route('products.index') }}">
                                <div class="search input-group form-group">
                            
                                    <input class="autosearch-input form-control" type="text" value="" size="50"
                                           autocomplete="off" placeholder="关键字搜索" name="search">
                                    <button type="submit" class="button-search btn btn-primary"><i
                                                class="fa fa-search"></i></button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- //end Search -->
                <div class="middle-right col-lg-3 col-md-3 col-sm-3">
                    <!--cart-->
                    <div class="shopping_cart">
                        <div id="cart" class="btn-shopping-cart">

                            <a  href="{{ route('cart.index') }}"  class="btn-group top_cart dropdown-toggle">
                                <div class="shopcart">
                                            <span class="icon-c">
                                                <i class="fa fa-shopping-bag"></i>
                                            </span>  
                                </div>
                            </a>
                        </div>

                    </div>
                    <!--//cart-->

                    <ul class="wishlist-comp hidden-md hidden-sm hidden-xs">
                        <li class="compare hidden-xs"><a href="javascript:void(0)" onclick="window.location.reload()"
                                                         class="top-link-compare" title="Compare "><i
                                        class="fa fa-refresh"></i></a>
                        </li>
                        <li class="wishlist hidden-xs"><a href="{{ route('products.favorites') }}" id="wishlist-total"
                                                          class="top-link-wishlist"
                                                          title="我的收藏"><i class="fa fa-heart"></i></a>
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
                                        <div class="megamenu-pattern" >
                                            <div class="container-mega" >
                                                <ul class="megamenu">
                                                    @if(isset($categoryTree))
                                                        @foreach($categoryTree as $category)
                                                            <li class="item-vertical  with-sub-menu hover">
                                                                <p class="close-menu"></p>
                                                                <a href="{{ route('products.index', ['category_id' => $category['id']]) }}"
                                                                   class="clearfix">
                                                                    <img src="/image/catalog/menu/icons/ico10.png"
                                                                         alt="icon">
                                                                    <span>{{ $category['name'] }}</span>
                                                                    <b class="fa-angle-right"></b>
                                                                </a>
                                                                <div class="sub-menu" data-subwidth="60" >
                                                                    <div class="content"  style="padding-top:10px">
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
                                                                                                                    <li style="float: left;margin-right: 5px;">
                                                                                                                        <a style="font-weight: bold;"
                                                                                                                           href="{{ route('products.index', ['category_id' => $children['id']]) }}">{{ $children['name'] }}
                                                                                                                            ></a>
                                                                                                                    </li>

                                                                                                                    @foreach($children['children'] as $child)
                                                                                                                        <li style="float: left;margin-right: 5px;">
                                                                                                                            <a href="{{ route('products.index', ['category_id' => $child['id']]) }}">{{ $child['name'] }}</a>
                                                                                                                        </li>
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
                                                    <a href="/">首页</a>
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
                            <li><a href="{{ route('orders.index') }}"><i class="fa fa-truck"></i>追踪您的订单</a></li>
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