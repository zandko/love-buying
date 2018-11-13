@extends('layouts.app')
@section('title', '订单信息')

@section('content')

    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">订单信息</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <h2 class="title">订单信息</h2>

                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td colspan="2" class="text-left">订单详细信息</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="width: 50%;" class="text-left"><b>订单编号:</b>{{$order->no}}
                            <br>
                            <br>
                            <b>添加日期:</b> {{ $order->created_at }}
                            <br>
                            <br>
                            @if($order->paid_at)
                                <b>付款日期:</b> {{ $order->paid_at }}
                                <br>
                                <br>
                            @endif

                            @if($order->remark)
                                <b>备注：</b>{{ $order->remark }}
                            @endif
                        </td>
                        <td style="width: 50%;" class="text-left"><b>付款方式:</b> {{ $order->payment_method }}

                        </td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td style="width: 50%; vertical-align: top;" class="text-left">收件地址</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                        <td class="text-left">
                            {{ join(' ',$order->address) }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td class="text-left">产品名称</td>
                            <td class="text-left">规格</td>
                            <td class="text-right">数量</td>
                            <td class="text-right">单价</td>
                            <td class="text-right">操作</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->orderItems as $index => $item)
                            <tr>
                                <td class="text-left">{{ $item->product->title }}</td>
                                <td class="text-left">{{ $item->productSku->title }}</td>
                                <td class="text-right">{{ $item->amount }}</td>
                                <td class="text-right">${{ $item->productSku->price }}</td>

                                @if($index == 0)
                                    <td rowspan="{{ count($order->orderItems) }}" style="white-space: nowrap;"
                                        class="text-right">
                                        @if(!$order->paid_at && !$order->closed)
                                            <a class="btn btn-primary" data-toggle="tooltip"
                                               href="{{ route('payment.alipay',['order'=>$order->id]) }}">继续支付</a>
                                        @elseif($order->closed)
                                            <a disabled class="btn btn-danger" data-toggle="tooltip">订单已关闭</a>
                                        @elseif($order->ship_status === \App\Models\Order::SHIP_STATUS_DELIVERED)
                                            <a id="btn-receive" class="btn btn-success">确认收货</a>
                                        @elseif($order->ship_status===\App\Models\Order::SHIP_STATUS_RECEIVED)
                                            @if(!$order->reviewed)
                                                <a id="btn-review"
                                                   href="{{ route('orders.review.show', ['order' => $order->id]) }}"
                                                   class="btn btn-primary">评价商品</a>
                                            @else
                                                <a id="btn-review"
                                                   href="{{ route('orders.review.show', ['order' => $order->id]) }}"
                                                   class="btn btn-primary">查看评价</a>
                                            @endif
                                            @if($order->refund_status === \App\Models\Order::REFUND_STATUS_SUCCESS)
                                                <a disabled class="btn btn-success" data-toggle="tooltip">退款成功</a>
                                            @else
                                                <a class="btn btn-danger" data-toggle="tooltip"
                                                   href="{{ route('orders.return', ['order' => $order->id]) }}">申请退款</a>
                                            @endif
                                        @endif
                                    </td>

                                @endif

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>优惠卷</b>
                            </td>
                            <td class="text-right">{{ $order->couponCode->code }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>优惠额度</b>
                            </td>
                            <td class="text-right">{{ $order->couponCode->description }}</td>
                        </tr>

                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>总价</b>
                            </td>
                            <td class="text-right">${{ $order->total_amount }}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <h3>订单状态</h3>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td class="text-left">
                            更新时间
                        </td>
                        <td class="text-left">状态</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $order->updated_at }}</td>
                        @if($order->paid_at)
                            @if($order->refund_status === \App\Models\Order::REFUND_STATUS_PENDING)
                                <td class="text-left">已支付</td>
                            @else
                                <td class="text-left">{{ \App\Models\Order::$refundStatusMap[$order->refund_status] }}</td>
                                {{ \App\Models\Order::$refundStatusMap[$order->refund_status] }}
                            @endif

                        @elseif($order->closed)
                            <td class="text-left">已关闭</td>
                        @else
                            <td class="text-left">未支付</td>
                        @endif

                    </tr>
                    <tr>
                        @if($order->paid_at && $order->refund_status !== \App\Models\Order::REFUND_STATUS_PENDING)

                            <td colspan="2" class="text-left">

                                退款理由：
                                {{ $order->extra['refund_return_reason_id'] }} &nbsp;&nbsp;&nbsp;&nbsp;
                                产品是否已经打开：
                                {{ $order->extra['refund_opened'] }} &nbsp;&nbsp;&nbsp;&nbsp;
                                其他：
                                {{ $order->extra['refund_comment'] }} &nbsp;&nbsp;&nbsp;&nbsp;
                            </td>
                        @elseif(isset($order->extra['refund_disagree_reason']))

                            <td colspan="2" class="text-left">
                                拒绝退款理由：
                                {{ $order->extra['refund_disagree_reason'] }}
                            </td>

                        @endif
                    </tr>

                    </tbody>
                </table>

                <h3>物流状态</h3>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td class="text-left">
                            发货时间
                        </td>
                        <td>
                            快递公司
                        </td>
                        <td>
                            物流单号
                        </td>
                        <td class="text-left">状态</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @if($order->ship_data)

                            <td>{{ $order->updated_at }}</td>

                            <td class="text-left">
                                {{ $order->ship_data['express_company'] }}
                            </td>
                            <td class="text-left">
                                {{ $order->ship_data['express_no'] }}
                            </td>
                            <td class="text-left">{{ \App\Models\Order::$shipStatusMap[$order->ship_status] }}</td>
                        @else
                            <td class="text-left">商家正在处理，请耐心等待发货</td>
                        @endif

                    </tr>
                    </tbody>
                </table>

                <div class="buttons clearfix">
                    <div class="pull-right"><a class="btn btn-primary" href="{{ route('orders.index') }}">返回</a>
                    </div>
                </div>


            </div>
            <!--Middle Part End-->

        </div>
    </div>
    <!-- //Main Container -->

@endsection

@section('scriptsAfterJs')

    <script>
        $(document).ready(function () {
            /*确认收货*/
            $('#btn-receive').click(function () {
                swal({
                    title: "确认已经收到商品？",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    buttons: ['取消', '确认'],
                })
                    .then(function (ret) {
                        if (!ret) {
                            return;
                        }
                        axios.post('{{ route('orders.received', [$order->id]) }}')
                            .then(function () {
                                location.reload();
                            });
                    });
            });
        });
    </script>

@endsection