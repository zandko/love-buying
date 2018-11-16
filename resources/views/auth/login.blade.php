@extends('layouts.app')

@section('content')

    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="#">账号</a></li>
            <li><a href="{{ route('login') }}">登录</a></li>
        </ul>

        <div class="row">
            <div id="content" class="col-sm-12">
                <div class="page-login">

                    <div class="account-border">
                        <div class="row">
                            <div class="col-sm-6 new-customer">
                                <div class="well">
                                    <h2><i class="fa fa-file-o" aria-hidden="true"></i> 新客户</h2>
                                    <p>通过创建帐户，您可以更快地购物，获得订单状态的最新信息，并跟踪您之前订购的订单。.</p>
                                </div>
                                <div class="bottom-form">
                                    <a href="{{ route('register') }}" class="btn btn-default pull-right">继续</a>
                                </div>
                            </div>

                            <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-sm-6 customer-login">
                                    <div class="well">
                                        <h2><i class="fa fa-file-text-o" aria-hidden="true"></i> 回头客</h2>
                                        <p><strong>我是老顾客</strong></p>
                                        <div class="form-group" {{ $errors->has('email') ? ' has-error' : '' }}>
                                            <label class="control-label " for="input-email">电子邮件地址</label>
                                            <input type="text" name="email" value="{{ old('email') }}" id="input-email"
                                                   class="form-control"/>

                                            @if($errors->has('email'))
                                                <span style="color: red">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group" {{ $errors->has('password') ? ' has-error' : '' }}>
                                            <label class="control-label " for="input-password">密码</label>
                                            <input type="password" name="password" value=""
                                                   class="form-control"/>

                                            @if($errors->has('password'))
                                                <span style="color: red">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="bottom-form">
                                        <input style="vertical-align:middle; margin-top:-1.9px;" type="checkbox"
                                               name="remember" value="" id="input-password"
                                                {{ old('remember') ? 'checked' : '' }}/>记住我

                                        <a href="{{ route('password.request') }}" class="forgot">忘记密码</a>
                                        <input type="submit" value="登录" class="btn btn-default pull-right"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 70px;"></div>
    <!-- //Main Container -->
@endsection
