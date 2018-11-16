@extends('layouts.app')
@section('title', '商品下单')

@section('content')
    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">查看</a></li>

        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <h2 class="title">查看</h2>
                <div class="so-onepagecheckout row">
                    <div class="col-left col-sm-3">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-user"></i>您的个人资料</h4>
                            </div>
                            <div class="panel-body">
                                <fieldset id="account">
                                    <div class="form-group required">
                                        <label for="input-payment-firstname" class="control-label">用户名</label>
                                        <input disabled type="text" value="{{ Auth::user()->name }}"
                                               class="form-control" id="input-payment-firstname"
                                               placeholder="First Name" value="" name="firstname">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-lastname" class="control-label">名字</label>
                                        <input disabled type="text" class="form-control"
                                               value="{{ Auth::user()->firstname }}" id="input-payment-lastname"
                                               placeholder="Last Name" value="" name="lastname">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-email" class="control-label">电子邮件</label>
                                        <input disabled type="text" value="{{ Auth::user()->email }}"
                                               class="form-control" id="input-payment-email" placeholder="E-Mail"
                                               value="" name="email">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-book"></i>你的地址</h4>
                            </div>
                            <div class="panel-body">
                                <fieldset id="address" class="required">
                                    <div class="form-group required">
                                        <label for="input-payment-postcode" class="control-label">详细地址</label>
                                        <textarea disabled type="text" class="form-control" id="input-payment-postcode"
                                                  value="" name="postcode">{{join(' ', $order->address)}}</textarea>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked="checked" value="1" name="shipping_address">
                                            我的递送和帐单地址是相同的。 </label>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-right col-sm-9">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default no-padding">

                                    <div class="col-sm-6  checkout-payment-methods">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><i class="fa fa-credit-card"></i>付款方法</h4>
                                        </div>
                                        <div class="panel-body">
                                            <p>请选择要在此订单上使用的首选付款方式。</p>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" checked="checked" name="class">支付宝</label>
                                            </div>

                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="class">微信</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-shopping-cart"></i>购物车</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <td class="text-center">图片</td>
                                                    <td class="text-left">产品名称</td>
                                                    <td class="text-left">数量</td>
                                                    <td class="text-right">单价</td>
                                                    <td class="text-right">总</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($order->orderItems as $index => $item)
                                                    <tr data-id="{{ $item->id }}">
                                                        <td class="text-center"><a
                                                                    href="{{ route('products.show',['product'=>$item->product->id]) }}"><img
                                                                        width="60px"
                                                                        src="{{ $item->productSku->image_url }}"
                                                                        alt="Xitefun Causal Wear Fancy Shoes"
                                                                        title="{{ $item->productSku->title }}"
                                                                        class="img-thumbnail"></a></td>
                                                        <td class="text-left"><a
                                                                    href="{{ route('products.show',['product'=>$item->product->id]) }}">{{ $item->product->title }}</a>
                                                        </td>
                                                        <td class="text-left">
                                                            <div class="input-group btn-block"
                                                                 style="min-width: 100px;">
                                                                <input type="text" name="quantity"
                                                                       value="{{ $item->amount }}" size="1"
                                                                       class="form-control">
                                                                <span class="input-group-btn">
										{{--<button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-refresh"></i></button>--}}

										</span></div>
                                                        </td>
                                                        <td class="text-right">${{ $item->productSku->price }}</td>
                                                        <td class="text-right">

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>

                                                <tr>
                                                    <td class="text-right" colspan="4"><strong>优惠卷:</strong></td>
                                                    <td class="text-right">{{ $order->couponCode->description }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right" colspan="4"><strong>总价:</strong></td>
                                                    <td class="text-right">${{ $order->total_amount }}</td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="panel panel-default">

                                    <div class="panel-body">
                                        <div class="buttons">
                                            <div class="pull-right">
                                                @if(!$order->paid_at && !$order->closed)
                                                    <a href="{{ route('payment.alipay',['order'=>$order->id]) }}"
                                                       class="btn btn-primary">提交订单</a>
                                                @endif

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Middle Part End -->

        </div>
    </div>


@endsection

