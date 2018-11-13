@extends('layouts.app')
@section('title', '商品评价')

@section('content')
    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ route('orders.index') }}">返回订单列表</a></li>
            <li><a href="#">订单信息</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-9">
                <h2 class="title"> 商品评价</h2>

                <div class="panel-body">
                    <form action="{{ route('orders.review.store', [$order->id]) }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>商品名称</td>
                                <td>打分</td>
                                <td>评价</td>
                            </tr>
                            @foreach($order->orderItems as $index => $item)
                                <tr>
                                    <td class="product-info">
                                        <div class="preview">
                                            <a target="_blank" href="{{ route('products.show', [$item->product_id]) }}">
                                                <img src="{{ $item->product->image_url }}">
                                            </a>
                                        </div>
                                        <div>
            <span class="product-title">
               <a target="_blank"
                  href="{{ route('products.show', [$item->product_id]) }}">{{ $item->product->title }}</a>
             </span>
                                            <span class="sku-title">{{ $item->productSku->title }}</span>
                                        </div>
                                        <input type="hidden" name="reviews[{{$index}}][id]" value="{{ $item->id }}">
                                    </td>
                                    <td class="vertical-middle">
                                        <!-- 如果订单已经评价则展示评分，下同 -->
                                        @if($order->reviewed)

                                            <span class="rating-star-yes">{{ str_repeat('★', $item->rating) }}</span>
                                            <span class="rating-star-no">{{ str_repeat('★', 5 - $item->rating) }}</span>
                                        @else
                                            <ul class="rate-area">
                                                <input type="radio" id="5-star-{{$index}}"
                                                       name="reviews[{{$index}}][rating]" value="5" checked/><label
                                                        for="5-star-{{$index}}"></label>
                                                <input type="radio" id="4-star-{{$index}}"
                                                       name="reviews[{{$index}}][rating]" value="4"/><label
                                                        for="4-star-{{$index}}"></label>
                                                <input type="radio" id="3-star-{{$index}}"
                                                       name="reviews[{{$index}}][rating]" value="3"/><label
                                                        for="3-star-{{$index}}"></label>
                                                <input type="radio" id="2-star-{{$index}}"
                                                       name="reviews[{{$index}}][rating]" value="2"/><label
                                                        for="2-star-{{$index}}"></label>
                                                <input type="radio" id="1-star-{{$index}}"
                                                       name="reviews[{{$index}}][rating]" value="1"/><label
                                                        for="1-star-{{$index}}"></label>
                                            </ul>
                                        @endif
                                    </td>
                                    <td class="{{ $errors->has('reviews.'.$index.'.review') ? 'has-error' : '' }}">
                                        @if($order->reviewed)
                                            {{ $item->review }}
                                        @else
                                            <textarea class="form-control"
                                                      name="reviews[{{$index}}][review]"></textarea>
                                            @if($errors->has('reviews.'.$index.'.review'))
                                                @foreach($errors->get('reviews.'.$index.'.review') as $msg)
                                                    <span class="help-block">{{ $msg }}</span>
                                                @endforeach
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3" class="text-center">
                                    @if(!$order->reviewed)
                                        <button type="submit" class="btn btn-primary center-block">提交</button>
                                    @else
                                        <a href="{{ route('orders.detail', [$order->id]) }}"
                                           class="btn btn-primary">查看订单</a>
                                    @endif
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection