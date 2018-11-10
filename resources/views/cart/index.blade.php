@extends('layouts.app')

@section('title','购物车')

@section('content')

    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="#">购物车</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <h2 class="title">购物车</h2>
                <div class="table-responsive form-group">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td class="text-center">图片</td>
                            <td class="text-left">产品名称</td>
                            <td class="text-left">规格</td>
                            <td class="text-left">数量</td>
                            <td class="text-right">单价</td>
                            <td class="text-right">总</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $item)
                            <tr data-id="{{ $item->productSku->id }}">
                                <td class="text-center"><a
                                            href="{{ route('products.show',[$item->productSku->product_id]) }}"><img
                                                width="70px" src="{{ $item->productSku->image_url }}"
                                                alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop"
                                                class="img-thumbnail"/></a></td>
                                <td class="text-left"><a
                                            href="{{ $item->productSku->product_id }}">{{ $item->productSku->product->title }}</a><br/>
                                </td>
                                <td class="text-left">{{ $item->productSku->title }}</td>
                                @if(!$item->productSku->product->on_sale)
                                    <td class="text-left">商品已下架</td>
                                @else
                                    <td class="text-left" width="200px">
                                        <div class="input-group btn-block quantity">
                                            <input @if(!$item->productSku->product->on_sale) disabled @endif type="text"
                                                   name="amount" value="{{ $item->amount }}" size="1"
                                                   class="form-control"/>
                                            <span class="input-group-btn">
                        <button type="submit" data-toggle="tooltip" title="修改" class="btn btn-primary"><i
                                    class="fa fa-clone"></i></button>
                        <button type="button" data-toggle="tooltip" title="移除" class="btn btn-danger" onClick=""><i
                                    class="fa fa-times-circle"></i></button>
                        </span></div>
                                    </td>
                                @endif
                                <td class="text-right">${{ $item->productSku->price }}</td>
                                <td class="text-right">$ {{ $item->amount * $item->productSku->price }}.00</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <h3 class="subtitle no-margin">你接下来想做什么？</h3>
                <p>选择您是否有想要使用的折扣代码或奖励积分，或者想要估算您的运送成本。</p>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="#collapse-coupon" class="accordion-toggle" data-toggle="collapse"
                                   data-parent="#accordion" aria-expanded="true">使用优惠券代码

                                    <i class="fa fa-caret-down"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse-coupon" class="panel-collapse collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <label class="col-sm-2 control-label" for="input-coupon">在这里输入您的优惠券
                                </label>
                                <div class="input-group">
                                    <input type="text" name="coupon" value="" placeholder="Enter your coupon here"
                                           id="input-coupon" class="form-control">
                                    <span class="input-group-btn"><input type="button" value="申请优惠卷" id="button-coupon"
                                                                         data-loading-text="Loading..."
                                                                         class="btn btn-primary"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="#collapse-shipping" class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#accordion" aria-expanded="false">Estimate Shipping &amp; Taxes

                                    <i class="fa fa-caret-down"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse-shipping" class="panel-collapse collapse" aria-expanded="false"
                             style="height: 0px;">
                            <div class="panel-body">
                                <p>Enter your destination to get a shipping estimate.</p>
                                <div class="form-horizontal">
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-country">Country</label>
                                        <div class="col-sm-10">
                                            <select name="country_id" id="input-country" class="form-control">
                                                <option value=""> --- Please Select ---</option>
                                                <option value="244">Aaland Islands</option>
                                                <option value="1">Afghanistan</option>
                                                <option value="2">Albania</option>
                                                <option value="3">Algeria</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-zone">Region / State</label>
                                        <div class="col-sm-10">
                                            <select name="zone_id" id="input-zone" class="form-control">
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
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-postcode">Post Code</label>
                                        <div class="col-sm-10"><input type="text" name="postcode" value=""
                                                                      placeholder="Post Code" id="input-postcode"
                                                                      class="form-control"></div>
                                    </div>
                                    <button type="button" id="button-quote" data-loading-text="Loading..."
                                            class="btn btn-primary">Get Quotes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td class="text-right">
                                    <strong>小计：</strong>
                                </td>
                                <td class="text-right">$168.71</td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <strong>优惠卷：</strong>
                                </td>
                                <td class="text-right">$0.00</td>
                            </tr>

                            <tr>
                                <td class="text-right">
                                    <strong>总：</strong>
                                </td>
                                <td class="text-right">$213.70</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="buttons">
                    <div class="pull-left"><a href="index.html" class="btn btn-primary">继续购物</a></div>
                    <div class="pull-right"><a href="checkout.html" class="btn btn-primary">查看</a></div>
                </div>
            </div>
            <!--Middle Part End -->

        </div>
    </div>
    <!-- //Main Container -->

@endsection

@section('scriptsAfterJs')

    <script>
        $(document).ready(function () {
            /*删除商品*/
            $('button.btn-danger').click(function () {
                var id = $(this).closest('tr').data('id');
                console.log(id);
                swal({
                    title: '确定要将该商品移除？',
                    icon: 'warning',
                    buttons: ['取消', '确定'],
                    dangerMode: true,
                })
                    .then(function (willDelete) {
                        if (!willDelete) {
                            return;
                        }

                        axios.delete('/cart/' + id)
                            .then(function () {
                                location.reload();
                            });
                    });
            });
        });
    </script>

@endsection