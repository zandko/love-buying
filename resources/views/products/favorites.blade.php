@extends('layouts.app')
@section('title', '我的收藏')

@section('content')

    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            {{--<li><a href="#">Account</a></li>--}}
            <li><a href="#">我的收藏</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <h2 class="title">我的收藏</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td class="text-center">图片</td>
                            <td class="text-left">产品名称</td>
                            <td class="text-left">销量</td>
                            <td class="text-right">评论量</td>
                            <td class="text-right">价格</td>
                            <td class="text-right">操作</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <input type="hidden" class="product_id" value="{{ $product->id }}">
                            <tr>
                                <td class="text-center">
                                    <a href="{{ route('products.show',['product'=>$product->id]) }}"><img width="70px"
                                                                                                          src="{{ $product->image_url }}"
                                                                                                          alt="{{ $product->title }}"
                                                                                                          title="{{ $product->title }}">
                                    </a>
                                </td>
                                <td class="text-left"><a
                                            href="{{ route('products.show',['product'=>$product->id]) }}">{{ $product->title }}</a>
                                </td>
                                <td class="text-left">{{ $product->sold_count }}</td>
                                <td class="text-right">{{ $product->review_count }}</td>
                                <td class="text-right">
                                    <div class="price"><span class="price-new">${{ $product->price }}</span> <span
                                                class="price-old">${{ $product->price+200 }}</span></div>
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('products.show',['product'=>$product->id]) }}"
                                       class="btn btn-primary"
                                       title="" data-toggle="tooltip"
                                       data-original-title="添加购物车"><i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <a class="btn btn-danger btn-disfavor" title="" data-toggle="tooltip" href=""
                                       data-original-title="移除"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>


                        @section('scriptsAfterJs')

                            <script>

                                $(document).ready(function () {
                                    /*取消收藏*/
                                    $('.btn-disfavor').click(function () {
                                        axios.delete('{{ route('products.disfavor', ['product' => $product->id]) }}')
                                            .then(function () {
                                                swal('操作成功', '', 'success')
                                                    .then(function () {
                                                        location.reload();
                                                    });
                                            });
                                    });
                                });

                            </script>

                        @endsection

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
    <!-- //Main Container -->

@endsection


