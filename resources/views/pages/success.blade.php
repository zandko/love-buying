@extends('layouts.app')

@section('title','操作成功')

@section('content')

<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="{{ route('register') }}">注册</a></li>
        <li><a href="{{ route('email_verify_notice') }}">验证邮箱</a></li>
    </ul>

    <div class="row">
        <div id="content" class="col-sm-12">

            <div class="about-us about-demo-2">
                <div class="row">
                    <div class="col-lg-12 col-md-12 about-us-center">
                        <div class="content-description">
                            <h2 class="about-title">{{ $msg }}</h2>
                            <p>感谢您的配合，祝您在本商城购物愉快！</p>
                        </div>
                        <div class="about-image-slider">
                            <div class="yt-content-slider" data-rtl="yes" data-autoplay="no" data-autoheight="no"
                                 data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1"
                                 data-items_column0="1" data-items_column1="1" data-items_column2="1"
                                 data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no"
                                 data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                <div class="yt-content-slide yt-clearfix yt-content-wrap"><img
                                            src="/image/demo/about/about-1.jpg" alt="About Us"></div>
                                <div class="yt-content-slide yt-clearfix yt-content-wrap"><img
                                            src="/image/demo/about/about-2.jpg" alt="About Us"></div>
                                <div class="yt-content-slide yt-clearfix yt-content-wrap"><img
                                            src="/image/demo/about/about-3.jpg" alt="About Us"></div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- //Main Container -->

@endsection