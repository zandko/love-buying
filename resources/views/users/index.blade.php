@extends('layouts.app')
@section('title', '我的资料')
@section('content')

    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="#">账号</a></li>
            <li><a href="{{ route('user_addresses.index') }}">我的账户</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div class="col-sm-12" id="content">
                <h2 class="title">我的资料</h2>
                <p class="lead">你好， <strong>{{ Auth::user()->firstname }} ！</strong> - 更新您的帐户信息。</p>
                <div class="row">
                    <div class="col-sm-6">
                        <fieldset id="personal-details">
                            <legend>个人资料</legend>
                            <div class="form-group required">
                                <label for="input-firstname" class="control-label">用户名</label>
                                <input disabled type="text" class="form-control" id="input-username"
                                       placeholder="User Name" value="{{ Auth::user()->name }}" name="firstname">
                            </div>
                            <div class="form-group required">
                                <label for="input-lastname" class="control-label">姓名</label>
                                <input disabled type="text" class="form-control" id="input-lastname"
                                       placeholder="Last Name" value="{{ Auth::user()->firstname }}" name="lastname">
                            </div>
                            <div class="form-group required">
                                <label for="input-email" class="control-label">邮箱</label>
                                <input disabled type="email" class="form-control" id="input-email" placeholder="E-Mail"
                                       value="{{ Auth::user()->email }}" name="email">
                            </div>

                        </fieldset>
                        <br>
                    </div>
                    <div class="col-sm-6">
                        <fieldset>
                            <legend>收货地址</legend>
                            <div class="form-group required">
                                <label for="input-address" class="control-label">地址列表</label>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>收货人</th>
                                        <th>地址</th>
                                        <th>邮编</th>
                                        <th>电话</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($addresses as $address)
                                        <tr>
                                            <td>{{ $address->contact_name }}</td>
                                            <td>{{ $address->full_address }}</td>
                                            <td>{{ $address->zip }}</td>
                                            <td>{{ $address->contact_phone }}</td>
                                            <td>
                                                <a class="btn btn-primary"
                                                   href="{{ route('user_addresses.edit',['user_address'=>$address->id]) }}">修改</a>
                                                <form action="{{ route('user_addresses.destory',['user_address'=>$address->id]) }}"
                                                      method="post" style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button class="btn btn-danger btn-del-address" type="button"
                                                            data-id="{{ $address->id }}">删除
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </fieldset>

                    </div>
                </div>


                <div class="buttons clearfix">
                    <div class="pull-right">
                        <a href="{{ route('user_addresses.create') }}" class="btn btn-md btn-primary">添加地址</a>
                    </div>
                </div>
            </div>
            <!--Middle Part End-->
            <!--Right Part Start -->
        {{--<aside class="col-sm-3 hidden-xs content-aside col-md-3" id="column-right">--}}
        {{--<h2 class="subtitle">导航</h2>--}}
        {{--<div class="list-group">--}}
        {{--<ul class="list-item">--}}
        {{--<li><a href="{{ route('user_addresses.create') }}">添加地址</a>--}}
        {{--</li>--}}
        {{--<li><a href="register.html">修改地址</a>--}}
        {{--</li>--}}
        {{--<li><a href="#">我的收藏</a>--}}
        {{--</li>--}}
        {{--<li><a href="#">我的订单</a>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--</aside>--}}
        <!--Right Part End -->
        </div>
    </div>
    <!-- //Main Container -->
@endsection

@section('scriptsAfterJs')

    <script>
        $(document).ready(function () {
            $('.btn-del-address').click(function () {
                var id = $(this).data('id');

                swal({
                    title: '确定要删除吗?',
                    icon: 'warning',
                    buttons: ['取消', '确定'],
                    dangerMode: true,
                })
                    .then(function (willDelete) {
                        if (!willDelete) {
                            return
                        }

                        axios.delete('/user_addresses/' + id)
                            .then(function () {
                                location.reload();
                            })
                    })
            });
        });
    </script>

@endsection