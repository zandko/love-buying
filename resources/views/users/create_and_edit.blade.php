@extends('layouts.app')
@section('title', ($addresses->id ? '修改' : '新增'). '收获地址')
@section('content')

    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ route('user_addresses.index') }}">账号</a></li>
            <li><a href="#">{{ $addresses->id ? '修改' : '新增' }}收货地址</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div class="col-sm-12" id="content">
                <h2 class="title">我的帐户</h2>
                <p class="lead">你好， <strong>{{ Auth::user()->firstname }}</strong> - {{ $addresses->id ? '修改' : '新增' }}
                    收货地址</p>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <h4>有错误发生：</h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li><i class="glyphicon glyphicon-remove"></i> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <user-addresses-create-and-edit inline-template>
                    @if($addresses->id)
                        <form action="{{ route('user_addresses.update',['user_address'=>$addresses->id]) }}"
                              method="post">
                            {{ method_field('PUT') }}
                            @else
                                <form action="{{ route('user_addresses.store') }}" method="post">
                                    @endif
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <fieldset id="shipping-address">
                                                <legend>收件地址</legend>
                                                <div id="app" class="form-group required">
                                                    <select-district
                                                            :init-value="{{ json_encode([$addresses->province, $addresses->city, $addresses->district]) }}"
                                                            @change="onDistrictChanged" inline-template>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2">省市区</label>
                                                            <div class="col-sm-3">
                                                                <select class="form-control" v-model="provinceId">
                                                                    <option value="">选择省</option>
                                                                    <option v-for="(name, id) in provinces" :value="id">
                                                                        @{{ name
                                                                        }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <select class="form-control" v-model="cityId">
                                                                    <option value="">选择市</option>
                                                                    <option v-for="(name, id) in cities" :value="id">@{{
                                                                        name }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <select class="form-control" v-model="districtId">
                                                                    <option value="">选择区</option>
                                                                    <option v-for="(name, id) in districts" :value="id">
                                                                        @{{ name
                                                                        }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </select-district>

                                                    <input type="hidden" name="province" v-model="province">
                                                    <input type="hidden" name="city" v-model="city">
                                                    <input type="hidden" name="district" v-model="district">

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-sm-6">
                                            <fieldset id="personal-details">
                                                <legend>详细地址</legend>
                                                <div class="form-group required">
                                                    <label for="input-firstname" class="control-label">详细地址</label>
                                                    <input type="text" class="form-control" id="input-address"
                                                           value="{{ old('address',$addresses->address) }}"
                                                           name="address">
                                                </div>
                                                <div class="form-group required">
                                                    <label for="input-zip" class="control-label">邮编</label>
                                                    <input type="text" class="form-control" id="input-zip"
                                                           value="{{ old('zip', $addresses->zip) }}" name="zip">
                                                </div>
                                                <div class="form-group required">
                                                    <label for="input-zip" class="control-label">姓名</label>
                                                    <input type="text" class="form-control" id="input-contact_name"
                                                           value="{{ old('zip', $addresses->contact_name) }}"
                                                           name="contact_name">
                                                </div>
                                                <div class="form-group required">
                                                    <label for="input-zip" class="control-label">电话</label>
                                                    <input type="text" class="form-control" id="input-contact_phone"
                                                           value="{{ old('zip', $addresses->contact_phone) }}"
                                                           name="contact_phone">
                                                </div>
                                            </fieldset>
                                            <br>
                                        </div>
                                    </div>


                                    <div class="buttons clearfix">
                                        <div class="pull-right">
                                            <input type="submit" class="btn btn-md btn-primary" value="保存提交">
                                        </div>
                                    </div>
                                </form>
                </user-addresses-create-and-edit>
            </div>
            <!--Middle Part End-->

        </div>
    </div>
    <!-- //Main Container -->

@endsection

@section('scriptsAfterJs')