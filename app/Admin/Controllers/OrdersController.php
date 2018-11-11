<?php

namespace App\Admin\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('订单')
            ->description('列表')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show(Content $content, Order $order)
    {
        return $content
            ->header('查看')
            ->description('订单')
            ->body(view('admin.orders.show', ['order' => $order]));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order);
        $grid->filter(function ($filter) {
            $filter->like('no', '订单号');
        });
        $grid->model()->whereNotNull('paid_at')->orderBy('paid_at', 'desc');
        $grid->id('ID');
        $grid->no('订单号');
        $grid->column('user.name', '买家');
        $grid->total_amount('总金额');
        $grid->remark('备注');
        $grid->paid_at('下单时间');
        $grid->payment_method('支付方式');

        $grid->reviewed('是否评价')->display(function ($reviewed) {
            return $reviewed ? '已' : '否';
        });
        $grid->ship_status('物流')->display(function ($ship_status) {
            return Order::$shipStatusMap[$ship_status];
        });
        $grid->refund_status('退款')->display(function ($refund_status) {
            return Order::$refundStatusMap[$refund_status];
        });

        $grid->disableRowSelector();
        $grid->disableCreateButton();
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableEdit();
        });

        return $grid;
    }


    public function ship(Order $order, Request $request)
    {
        if (!$order->paid_at) {
            throw new InvalidRequestException('该订单未付款');
        }

        if ($order->ship_status !== Order::SHIP_STATUS_PENDING) {
            throw  new InvalidRequestException('该订单已发货');
        }

        $data = $this->validate($request, [
            'express_company' => ['required'],
            'express_no' => ['required'],
        ], [], [
            'express_company' => '物流公司',
            'express_no' => '物流单号',
        ]);

        $order->update([
            'ship_status' => Order::SHIP_STATUS_DELIVERED,
            'ship_data' => $data,
        ]);

        return redirect()->back();
    }
}
