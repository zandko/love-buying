<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\UserAddress;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Request $request, Order $order)
    {
        $orders = Order::query()
            ->with('orderItems.product', 'orderItems.productSku')
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('orders.index', [
            'orders' => $orders,
        ]);
    }

    public function detail(Order $order, Request $request)
    {
        $this->authorize('own', $order);
        /*延迟预加载*/
        return view('orders.detail', [
            'order' => $order->load([
                'orderItems.productSku',
                'orderItems.product'
            ])
        ]);
    }

    public function store(OrderRequest $request, OrderService $orderService)
    {
        $user = $request->user();
        $address_id = $request->input('address_id');
        $address = UserAddress::find($address_id);
        $remart = $request->input('remark');
        $items = $request->input('items');

        return $orderService->store($user, $address, $remart, $items);
    }

    public function show(Request $request, Order $order)
    {
        $this->authorize('own', $order);
        return view('orders.show', [
            'order' => $order->load([
                'orderItems.productSku',
                'orderItems.product'
            ])
        ]);
    }

    public function received(Order $order, Request $request)
    {
        $this->authorize('own', $order);

        if ($order->ship_status != Order::SHIP_STATUS_DELIVERED) {
            throw new InvalidRequestException('发货状态不正确');
        }

        $order->update(['ship_status' => Order::SHIP_STATUS_RECEIVED]);

        return $order;
    }

}
