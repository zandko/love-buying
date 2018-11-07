@extends('layouts.app')
@section('title', '我的收藏')

@section('content')

<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="#">My Wish List</a></li>
    </ul>

    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
            <h2 class="title">My Wish List</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td class="text-center">Image</td>
                        <td class="text-left">Product Name</td>
                        <td class="text-left">Model</td>
                        <td class="text-right">Stock</td>
                        <td class="text-right">Unit Price</td>
                        <td class="text-right">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center">
                            <a  href="product.html"><img width="70px" src="/image/catalog/demo/product/80/2.jpg" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop">
                            </a>
                        </td>
                        <td class="text-left"><a href="product.html">iPad</a>
                        </td>
                        <td class="text-left">Pt 001</td>
                        <td class="text-right">In Stock</td>
                        <td class="text-right">
                            <div class="price"> <span class="price-new">$45</span> <span class="price-old">$80</span></div>

                        </td>
                        <td class="text-right">
                            <button class="btn btn-primary"
                                    title="" data-toggle="tooltip"
                                    onclick="cart.add('48');"
                                    type="button" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i>
                            </button>
                            <a class="btn btn-danger" title="" data-toggle="tooltip" href="" data-original-title="Remove"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <a href="product.html"><img width="70px" src="/image/catalog/demo/product/80/1.jpg" alt="Xitefun Causal Wear Fancy Shoes" title="Xitefun Causal Wear Fancy Shoes"></a>
                        </td>
                        <td class="text-left"><a href="product.html">Comas samer rumas</a>
                        </td>
                        <td class="text-left">Pt 002</td>
                        <td class="text-right">Pre-Order</td>
                        <td class="text-right">
                            <div class="price"> <span class="price-new">$85</span> </div>
                        </td>
                        <td class="text-right">
                            <button class="btn btn-primary"
                                    title="" data-toggle="tooltip"
                                    onclick="" type="button"
                                    data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i>
                            </button>
                            <a class="btn btn-danger" title="" data-toggle="tooltip"
                               href="" data-original-title="Remove"><i class="fa fa-times"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!--Middle Part End-->
        <aside class="col-sm-3 hidden-xs content-aside col-md-3" id="column-right">
            <h2 class="subtitle">Account</h2>
            <div class="list-group">
                <ul class="list-item">
                    <li><a href="login.html">Login</a>
                    </li>
                    <li><a href="register.html">Register</a>
                    </li>
                    <li><a href="#">Forgotten Password</a>
                    </li>
                    <li><a href="#">My Account</a>
                    </li>
                    <li><a href="#">Address Books</a>
                    </li>
                    <li><a href="wishlist.html">Wish List</a>
                    </li>
                    <li><a href="#">Order History</a>
                    </li>
                    <li><a href="#">Downloads</a>
                    </li>
                    <li><a href="#">Reward Points</a>
                    </li>
                    <li><a href="#">Returns</a>
                    </li>
                    <li><a href="#">Transactions</a>
                    </li>
                    <li><a href="#">Newsletter</a>
                    </li>
                    <li><a href="#">Recurring payments</a>
                    </li>
                </ul>
            </div>
        </aside>
    </div>
</div>
<!-- //Main Container -->

@endsection