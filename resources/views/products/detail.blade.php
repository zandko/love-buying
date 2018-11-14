@extends('layouts.app')


	<!-- Main Container  -->
	 <div class="main-container container">
		
		 <div class="row">
			 <!--Middle Part Start-->
			 <div id="content" class="col-md-12 col-sm-12">
				
				<div class="product-view row quickview-w">
					<div class="left-content-product">
				
						<div class="content-product-left class-honizol col-md-5 col-sm-12 col-xs-12">
							<div class="large-image  ">
									<img itemprop="image" class="product-image-zoom"
									src="/image/catalog/demo/product/fashion/1.jpg" title="{{ $product->title }}"
									alt="Chicken swinesha">
							</div>
							<a class="thumb-video pull-left" href="https://www.youtube.com/watch?v=HhabgvIIXik"><i class="fa fa-youtube-play"></i></a>
							
							<div id="thumb-slider" class="yt-content-slider full_slider owl-drag"  data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column0="4" data-items_column1="3" data-items_column2="4"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
								
								@foreach($product->product_sku as $k => $sku)
								<a data-index="{{$k}}" class="img thumbnail "
								   data-image="/image/catalog/demo/product/fashion/2.jpg" title="Chicken swinesha">
									<img src="{{ $sku->image_url }}" title="{{ $sku->title }}"
										 alt="Chicken swinesha">
								</a>
							@endforeach
							</div>
							
						</div>

						<div class="content-product-right col-md-7 col-sm-12 col-xs-12" style="margin-top:0px">
							<div class="title-product">
								<h1>{{ $product->long_title }}</h1>
							</div>
							<!-- Review ---->
							<div class="box-review form-group">
								<div class="ratings">
									<div class="rating-box">
											@for($i =1;$i<=floor($product->rating);$i++)
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                        @endfor
									</div>
								</div>

								<a class="reviews_button" href=""
                                   onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">{{ $product->review_count }}
                                    评论</a>
							</div>

							<div class="product-label form-group">
                                <div class="product_page_price price" itemprop="offerDetails" itemscope=""
                                     itemtype="http://data-vocabulary.org/Offer">
                                    <span class="price-new price-news" itemprop="price">${{ $product->price }}</span>
                                    <span class="price-old price-olds">${{ $product->price + 200}}</span>
                                </div>
                                
                            </div>

							<div class="product-box-desc">
									<div class="inner-box-desc">
										<div class="brand"><span>上架时间 :</span><a href="#">{{ $product->created_at    }}</a>
										</div>
										<div class="price-tax"><span>税前 :</span> <span
													class="min_price">${{ $product->price }}</span></div>
										<div class="model"><span>产品代码 :</span> {{ $product->id }}</div>
										<div class="model"><span>销量 :</span> {{ $product->sold_count }}</div>
									</div>
								</div>


								<div id="product">
										<h4>可用选项</h4>
										<div class="image_option_type form-group required">
											<label class="control-label">规格</label>
											<ul class="product-options clearfix" id="input-option231">
												@foreach($product->product_sku as $sku)
													<li style="margin-right: 10px" class="radio">
														<label class="sku-btn"
															   data-price="{{ $sku->price }}"
															   data-stock="{{ $sku->stock }}"
															   data-toggle="tooltip"
															   title="{{ $sku->description }}"
															   data-image="{{$sku->image_url}}"
															   data-placement="bottom">
															<input class="image_radio" type="radio" name="skus"
																   value="{{ $sku->id }}">
															<img style="width: 50px" src="{{ $sku->image_url }}"
																 data-original-title="{{ $sku->description }}"> <i
																	class="fa fa-check"></i>
															<label>{{ $sku->title }}</label>
														</label>
													</li>
												@endforeach
												{{--<li class="selected-option">--}}
												{{--</li>--}}
											</ul>
										</div>
		
										<div class="box-checkbox form-group required">
											<label class="control-label">库存</label>
											<div id="input-option232">
												<div class="checkbox">
													<span class="stock">{{ $product->stock }}</span>
												</div>
		
											</div>
										</div>
		
										<div class="form-group box-info-product">
											<div class="option quantity">
												<div class="input-group quantity-control cart_amount" unselectable="on"
													 style="-webkit-user-select: none;">
													<label>数量</label>
													<input class="form-control" type="text" name="amount"
														   value="1">
													{{--<input type="hidden" name="product_id" value="50">--}}
													<span class="input-group-addon product_quantity_down">−</span>
													<span class="input-group-addon product_quantity_up">+</span>
												</div>
											</div>
											<div class="cart">
												<input type="button" data-toggle="tooltip" title="" value="添加到购物车"
													   data-loading-text="Loading..." id="button-cart"
													   class="btn btn-mega btn-lg"
											
													   data-original-title="亲，您看要不加一下">
											</div>
											<div class="add-to-links wish_comp">
												<ul class="blank list-inline">
													<li class="wishlist">
														@if(!$favored)
															<a class="icon btn-favor" data-toggle="tooltip" title=""
															  data-original-title="加入收藏"><i
																		class="fa fa-heart"></i>
															</a>
														@else
															<a style="background: crimson" class="icon btn-disfavor"
															   data-toggle="tooltip" title=""
															   data-original-title="取消收藏"><i
																		class="fa fa-heart"></i>
															</a>
														@endif
		
													</li>
												</ul>
											</div>
		
										</div>
		
									</div>
							<!-- end box info product -->

						</div>
				
					</div>
				</div>
				
				 <script type="text/javascript">
					// Cart add remove functions
					var cart = {
						'add': function(product_id, quantity) {
							parent.addProductNotice('Product added to Cart', '<img src="image/demo/shop/product/e11.jpg" alt="">', '<h3><a href="#">Apple Cinema 30"</a> added to <a href="#">shopping cart</a>!</h3>', 'success');
						}
					}

					var wishlist = {
						'add': function(product_id) {
							parent.addProductNotice('Product added to Wishlist', '<img src="image/demo/shop/product/e11.jpg" alt="">', '<h3>You must <a href="#">login</a>  to save <a href="#">Apple Cinema 30"</a> to your <a href="#">wish list</a>!</h3>', 'success');
						}
					}
					var compare = {
						'add': function(product_id) {
							parent.addProductNotice('Product added to compare', '<img src="image/demo/shop/product/e11.jpg" alt="">', '<h3>Success: You have added <a href="#">Apple Cinema 30"</a> to your <a href="#">product comparison</a>!</h3>', 'success');
						}
					}

					
				</script>

				
			 </div>
			
			
		 </div>
		 <!--Middle Part End-->
	 </div>
	 <!-- //Main Container -->
	
 <style type="text/css">
	#wrapper{box-shadow:none;}
	#wrapper > *:not(.main-container){display: none;}
	#content{margin:0}
	.container{width:100%;}
	
	.product-info .product-view,.left-content-product,.box-info-product{margin:0;}
	.left-content-product .content-product-right .box-info-product .cart input{padding:12px 16px;}

	.left-content-product .content-product-right .box-info-product .add-to-links{ width: auto;  float: none; margin-top: 0px; clear:none; }
	.add-to-links ul li{margin:0;}
	
</style></div>

@section('scriptsAfterJs')

    <script>
        $(document).ready(function () {
            /*获取规格信息*/
            $('[data-toggle="tooltip"]').tooltip({trigger: 'hover'});
            $('.sku-btn').click(function () {
                $('.price-news').text($(this).data('price'));
                $('.price-olds').text($(this).data('price'));
                $('.min_price').text($(this).data('price'));
                $('.stock').text('库存：' + $(this).data('stock') + '件');
            });

            /*加入购物车*/
            $("#button-cart").click(function () {
                axios.post('{{ route('cart.store') }}', {
                    sku_id: $('li.active input[name=skus]').val(),
                    amount: $('.cart_amount input').val(),
                })
                    .then(function () {
                        swal('加入购物车成功', '', 'success');
                    }, function (error) {
                        if (error.response.status === 401) {
                            swal('请先登录', '', 'error');
                        } else if (error.response.status === 422) {
                            var html = '<div>';
                            _.each(error.response.data.errors, function (errors) {
                                _.each(errors, function (error) {
                                    html += error + '<br>';
                                })
                            });

                            html += '</div>';

                            swal({content: $(html)[0], icon: 'error'});
                        } else {
                            WW
                            swal('系统错误', '', 'error');
                        }
                    });
            });

            /*收藏*/
            $('.btn-favor').click(function () {
                axios.post('{{ route('products.favor', ['product' => $product->id]) }}')
                    .then(function () {
                        swal('操作成功', '', 'success')
                            .then(function () {
                                location.reload();
                            })
                    }, function (error) {
                        if (error.response && error.response.status === 401) {
                            swal('请先登录', '', 'error');
                        } else if (error.response && error.response.data.msg) {
                            swal(error.response.data.msg, '', 'error');
                        } else {
                            swal('系统错误', '', 'error');
                        }
                    });
            });

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