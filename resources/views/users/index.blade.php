@extends('layouts.app')
@section('title', '我的资料')
@section('content')

    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="#">账号</a></li>
            <li><a href="#">我的账户</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div class="col-sm-9" id="content">
                <h2 class="title">我的帐户</h2>
                <p class="lead">你好， <strong>{{ Auth::user()->firstname }}</strong> - 更新您的帐户信息。</p>
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <fieldset id="personal-details">
                                <legend>个人资料</legend>
                                <div class="form-group required">
                                    <label for="input-firstname" class="control-label">名字</label>
                                    <input type="text" class="form-control" id="input-firstname"
                                           placeholder="First Name" value="" name="firstname">
                                </div>

                                <div class="form-group required">
                                    <label for="input-email" class="control-label">电子邮件</label>
                                    <input type="email" class="form-control" id="input-email" placeholder="E-Mail"
                                           value="" name="email">
                                </div>

                            </fieldset>
                            <br>
                        </div>
                        <div class="col-sm-6">
                            <fieldset>
                                <legend>更改密码</legend>
                                <div class="form-group required">
                                    <label for="input-password" class="control-label">旧密码</label>
                                    <input type="password" class="form-control" placeholder="Old Password" value=""
                                           name="old-password">
                                </div>
                                <div class="form-group required">
                                    <label for="input-password" class="control-label">新密码</label>
                                    <input type="password" class="form-control" placeholder="New Password" value=""
                                           name="new-password">
                                </div>
                                <div class="form-group required">
                                    <label for="input-confirm" class="control-label">新密码确认</label>
                                    <input type="password" class="form-control" id="input-confirm"
                                           placeholder="New Password Confirm" value="" name="new-confirm">
                                </div>
                            </fieldset>

                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-6">
                            <fieldset id="shipping-address">
                                <legend>Shipping Address</legend>
                                <div class="form-group">
                                    <label for="input-company" class="control-label">Company</label>
                                    <input type="text" class="form-control" id="input-company" placeholder="Company"
                                           value="" name="company">
                                </div>
                                <div class="form-group required">
                                    <label for="input-address-1" class="control-label">Address 1</label>
                                    <input type="text" class="form-control" id="input-address-1" placeholder="Address 1"
                                           value="" name="address_1">
                                </div>
                                <div class="form-group required">
                                    <label for="input-city" class="control-label">City</label>
                                    <input type="text" class="form-control" id="input-city" placeholder="City" value=""
                                           name="city">
                                </div>
                                <div class="form-group required">
                                    <label for="input-postcode" class="control-label">Post Code</label>
                                    <input type="text" class="form-control" id="input-postcode" placeholder="Post Code"
                                           value="" name="postcode">
                                </div>
                                <div class="form-group required">
                                    <label for="input-country" class="control-label">Country</label>
                                    <select class="form-control" id="input-country" name="country_id">
                                        <option value=""> --- Please Select ---</option>
                                        <option value="244">Aaland Islands</option>
                                        <option value="1">Afghanistan</option>
                                        <option value="2">Albania</option>
                                        <option value="3">Algeria</option>
                                        <option value="4">American Samoa</option>
                                        <option value="5">Andorra</option>
                                        <option value="6">Angola</option>
                                        <option value="7">Anguilla</option>
                                        <option value="8">Antarctica</option>
                                        <option value="9">Antigua and Barbuda</option>
                                        <option value="10">Argentina</option>
                                        <option value="11">Armenia</option>
                                        <option value="12">Aruba</option>

                                    </select>
                                </div>
                                <div class="form-group required">
                                    <label for="input-zone" class="control-label">Region / State</label>
                                    <select class="form-control" id="input-zone" name="zone_id">
                                        <option value=""> --- Please Select ---</option>
                                        <option value="3513">Aberdeen</option>
                                        <option value="3514">Aberdeenshire</option>
                                        <option value="3515">Anglesey</option>
                                        <option value="3516">Angus</option>
                                        <option value="3517">Argyll and Bute</option>
                                        <option value="3518">Bedfordshire</option>
                                        <option value="3519">Berkshire</option>

                                    </select>
                                </div>
                            </fieldset>
                        </div>
                    </div>


                    <div class="buttons clearfix">
                        <div class="pull-right">
                            <input type="submit" class="btn btn-md btn-primary" value="Save Changes">
                        </div>
                    </div>
                </form>
            </div>
            <!--Middle Part End-->

        </div>
    </div>
    <!-- //Main Container -->

@endsection