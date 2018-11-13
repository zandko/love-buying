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
                            <td><input id="select-all" type="checkbox"></td>
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
                                <td><input type="checkbox" name="select"
                                           value="{{ $item->productSku->id }}" {{ $item->productSku->product->on_sale ? 'checked' : 'disabled' }}>
                                </td>
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
                            {{--<button type="submit" data-toggle="tooltip" title="修改" class="btn btn-primary"><i--}}
                                                {{--class="fa fa-clone"></i></button>--}}
                                                <button type="button" data-toggle="tooltip" title="移除"
                                                        class="btn btn-danger" onClick=""><i
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
                                   data-parent="#accordion" aria-expanded="false">选择地址 &amp; 备注

                                    <i class="fa fa-caret-down"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse-shipping" class="panel-collapse collapse" aria-expanded="false"
                             style="height: 0px;">
                            <div class="panel-body">
                                <p>选择地址和备注。</p>
                                <div class="form-horizontal">
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-country">地址</label>
                                        <div class="col-sm-10">
                                            <select name="address" id="input-country" class="form-control">
                                                @foreach($addresses as $address)
                                                    <option value="{{ $address->id }}">{{ $address->full_address }} {{ $address->contact_name }} {{ $address->contact_phone }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-postcode">备注</label>
                                        <div class="col-sm-10" id="order-form">
                                            <textarea name="remark" id="" cols="20" class="form-control"
                                                      rows="10"></textarea>
                                        </div>
                                    </div>
                                    <button type="button" id="button-quote" data-loading-text="Loading..."
                                            class="btn btn-primary">添加新地址
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="buttons">
                    <div class="pull-left"><a href="{{ route('products.index') }}" class="btn btn-primary">继续购物</a>
                    </div>
                    <div class="pull-right"><a id="btn-show" class="btn btn-primary">查看</a></div>
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


            /*全选全不选*/
            $('#select-all').change(function () {
                var checked = $(this).prop('checked');

                $('input[name=select][type=checkbox]:not([disabled])').each(function () {
                    $(this).prop('checked', checked);
                });
            });

            /*订单信息*/
            $('#btn-show').click(function () {

                var req = {
                    items: [],
                    address_id: $('#input-country option:selected').val(),
                    remark: $('#order-form').find('textarea[name=remark]').val(),
                }

                $('table tr[data-id]').each(function () {
                    var checkbox = $(this).find('input[name=select][type=checkbox]');
                    if (checkbox.prop('disabled') || !checkbox.prop('checked')) {
                        return;
                    }

                    var input = $(this).find('input[name=amount]');

                    if (input.val() == 0 || isNaN(input.val())) {
                        return;
                    }

                    req.items.push({
                        sku_id: $(this).data('id'),
                        amount: input.val(),
                    })
                });
                axios.post('{{ route('orders.store') }}', req)
                    .then(function (response) {
                        swal('订单提交成功', '', 'success')
                            .then(function () {
                                location.href = '/orders/' + response.data.id + '/show';
                            })
                    }, function (error) {
                        if (error.response.status === 422) {
                            var html = '<div>';
                            _.each(error.response.data.errors, function (errors) {
                                _.each(errors, function (error) {
                                    html += error + '<br>';
                                })
                            });
                            html += '</div>';
                            swal({content: $(html)[0], icon: 'error'})
                        } else {
                            swal('系统错误', '', 'error');
                        }
                    });
            });
        });

    </script>

@endsection