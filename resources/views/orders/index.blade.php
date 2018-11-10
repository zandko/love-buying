@extends('layouts.app')
@section('title', '商品列表')

@section('content')

    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="#">订单历史</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-9">
                <h2 class="title">订单历史</h2>
                <div class="table-responsive">
                    @foreach($orders as $order)

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td class="text-center">图片</td>
                                <td class="text-left">产品名称</td>
                                <td class="text-center">数量</td>
                                <td class="text-center">单价</td>
                                <td class="text-center">状态</td>
                                <td class="text-center">添加日期</td>
                                <td class="text-right">总</td>
                                <td></td>
                            </tr>
                            </thead>

                            <tbody>
                            订单号： <span class="text-center">{{ $order->no }}</span>

                            @foreach($order->orderItems as $index => $item)

                                <tr>
                                    <td class="text-center">
                                        <a href="{{ route('products.show',['product'=>$item->product->id]) }}"><img
                                                    width="85" class="img-thumbnail" title="{{ $item->product->title }}"
                                                    alt="Aspire Ultrabook Laptop"
                                                    src="{{ $item->productSku->image_url }}">
                                        </a>
                                    </td>
                                    <td class="text-left"><a
                                                href="{{ route('products.show',['product'=>$item->product->id]) }}">{{ $item->productSku->title }}</a>
                                    </td>
                                    <td class="text-center">{{ $item->amount }}</td>
                                    <td class="text-center">{{ $item->price }}</td>
                                    @if($index === 0)
                                        @if($order->paid_at)
                                            @if($order->refund_status === \App\Models\Order::REFUND_STATUS_PENDING)
                                                <td class="text-center">已支付</td>
                                            @else
                                                <td class="text-center">{{ \App\Models\Order::$refundStatusMap[$order->refund_status] }}</td>

                                            @endif
                                        @elseif($order->closed)
                                            <td class="text-center">已关闭</td>
                                        @else
                                            <td class="text-center"> 未支付<br>
                                                请于 {{ $order->created_at->addSeconds(config('app.order_ttl'))->format('H:i') }}
                                                前完成支付<br>
                                                否则订单将自动关闭
                                            </td>
                                        @endif


                                        <td rowspan="{{ count($order->orderItems) }}"
                                            class="text-center">{{ $order->created_at->format('Y-m-d H:i:s') }}</td>

                                        <td rowspan="{{ count($order->orderItems) }}" class="text-right">
                                            $ {{ $order->total_amount }}</td>

                                        <td rowspan="{{ count($order->orderItems) }}" class="text-center"><a
                                                    class="btn btn-info" title="" data-toggle="tooltip"
                                                    href="{{ route('orders.detail',['order'=>$order->id]) }}"
                                                    data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                    @endforeach

                </div>
                <div style="float: right">{{ $orders->render() }}</div>
            </div>
            <!--Middle Part End-->

        </div>
    </div>
    <!-- //Main Container -->

@endsection