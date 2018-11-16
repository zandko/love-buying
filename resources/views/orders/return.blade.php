@extends('layouts.app')

@section('title', '申请退款')

@section('content')

    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ route('orders.detail',['order'=>$order->id]) }}">返回</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <h2 class="title">产品退货</h2>
                <p>请填写下面的表格以申请退货。</p>

                <form class="form-horizontal">
                    <fieldset>
                        <legend>退款理由</legend>


                        <div class="form-group required">
                            <label class="col-sm-2 control-label">回来的理由</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="7天无理由退款" name="return_reason_id">7天无理由退款</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="订单错误" name="return_reason_id">订单错误</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="收到了错的东西" name="return_reason_id">收到了错的东西</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="其他" name="return_reason_id">其他
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label">产品已打开</label>
                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input type="radio" value="是" name="opened"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" checked="checked" value="否" name="opened"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-comment" class="col-sm-2 control-label">其他详情</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="input-comment" placeholder="Other details" rows="10"
                                          name="comment"></textarea>
                            </div>
                        </div>
                    </fieldset>
                    <div class="buttons clearfix">
                        <div class="pull-left"><a class="btn btn-default buttonGray"
                                                  href="{{ route('orders.detail',['order'=>$order->id]) }}">返回</a>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary btn-apply-refund">提交</a>
                        </div>
                    </div>
                </form>


            </div>

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

            $('.btn-apply-refund').click(function () {
                var return_reason_id = $('input[name=return_reason_id]:checked').val();
                var opened = $('input[name=opened]:checked').val();
                var comment = $('#input-comment').val();

                if (!return_reason_id) {
                    swal('退款理由不能为空', '', 'error')
                    return;
                }

                if (!opened) {
                    swal('产品是否已拆开', '', 'error')
                    return;
                }

                axios.post('{{ route('orders.apply_refund',['order'=>$order->id]) }}', {
                    return_reason_id: return_reason_id,
                    opened: opened,
                    comment: comment,

                })
                    .then(function (response) {
                        console.log(response.data);
                        swal('申请退款成功', '', 'success')
                            .then(function () {
                                location.href = '/orders/' + response.data.id + '/detail';
                            })
                    }, function (errors) {
                        return;
                    })
            });
        });
    </script>

@endsection