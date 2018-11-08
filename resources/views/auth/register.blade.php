@extends('layouts.app')

@section('title','注册')

@section('content')
    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="#">账号</a></li>
            <li><a href="{{ route('register') }}">注册</a></li>
        </ul>

        <div class="row">
            <div id="content" class="col-sm-12">
                <h2 class="title">注册账户</h2>
                <p>如果您已经拥有我们的帐户，请在登录页面登录。<a href="{{ route('login') }}">登录</a>.</p>
                <form action="{{ route('register') }}" method="post" enctype="multipart/form-data"
                      class="form-horizontal account-register clearfix">
                    {{ csrf_field() }}
                    <fieldset id="account">
                        <legend>您的个人资料</legend>

                        <div class="form-group required" {{ $errors->has('name') ? ' has-error' : '' }}>
                            <label class="col-sm-2 control-label" for="input-name">用户名</label>
                            <div class="col-sm-10">

                                <input type="text" name="name" value="{{ old('name') }}"
                                       @if($errors->has('name')) style="border-color: red"
                                       placeholder="{{ $errors->first('name') }}" @else placeholder="User Name"
                                       @endif id="input-name"
                                       class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group required" {{ $errors->has('email') ? ' has-error' : '' }}>
                            <label class="col-sm-2 control-label" for="input-email">邮箱</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" value="{{ old('email') }}"
                                       @if($errors->has('name')) style="border-color: red"
                                       placeholder="{{ $errors->first('email') }}" @else placeholder="Email" @endif
                                       class="form-control" id="input-email" required>
                            </div>
                        </div>
                        <div class="form-group required" {{ $errors->has('firstname') ? ' has-error' : '' }}>
                            <label class="col-sm-2 control-label" for="input-firstname">名字</label>
                            <div class="col-sm-10">
                                <input type="text" name="firstname" value="{{ old('firstname') }}"
                                       @if($errors->has('firstname')) style="border-color: red"
                                       placeholder="{{ $errors->first('firstname') }}" @else placeholder="First Name"
                                       @endif
                                       id="input-firstname" class="form-control" required>
                            </div>
                        </div>
                    </fieldset>

                    <legend>你的密码</legend>
                    <div class="form-group required" {{ $errors->has('password') ? ' has-error' : '' }}>
                        <label class="col-sm-2 control-label" for="input-password">密码</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" value=""
                                   @if($errors->has('password')) style="border-color: red"
                                   placeholder="{{ $errors->first('password') }}" @else placeholder="Password" @endif
                                   id="input-password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-confirm">确认密码</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirmation" value="" placeholder="Password Confirm"
                                   id="input-confirm" class="form-control" required>
                        </div>
                    </div>
                    </fieldset>

                    <div class="buttons">
                        <div class="pull-right">
                            我已阅读并同意
                            <input style="vertical-align:middle; margin-top:-1.9px;" class="box-checkbox" type="checkbox" name="agree" value="1"> &nbsp;
                            <input type="submit" value="提交" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- //Main Container -->
@endsection

@section('scriptsAfterJs')

@endsection
