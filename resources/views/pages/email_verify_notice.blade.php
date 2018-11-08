@extends('layouts.app')

@section('title','验证邮箱')

@section('content')

<!-- Main Container  -->
<div class="main-container container">
    <div class="row">
        <div id="content" class="col-sm-12">

            <div class="about-us about-demo-2">
                <div class="row">
                    <div class="col-lg-12 col-md-12 about-us-center">
                        <div class="content-description">
                            <h2 class="about-title">请先验证邮箱</h2>
                            <b><a style="color: red;" href="{{ route('email_verification.send') }}">重新发送验证邮件</a></b>
                            <p>为了网站安全与您个人的账户安全，请进行邮箱验证之后再进行操作！ 谢谢配合</p>
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