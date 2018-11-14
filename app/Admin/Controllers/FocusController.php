<?php

namespace App\Admin\Controllers;

use App\Models\Focu;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class FocusController extends Controller
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
            ->header('广告')
            ->description('列表')
            ->body($this->grid());
    }


    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('修改')
            ->description('广告')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('添加')
            ->description('广告')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Focu);

        $grid->id('ID');

        $grid->image('图片')->display(function () {
            return "<img width='50' src='$this->image_url'>";
        });
        $grid->url('链接地址');
        $grid->alt('描述');
        $grid->remark('备注');
        $grid->sort('排序');
        $grid->status('状态')->display(function ($status) {
            return $status ? '启' : '禁';
        });
        $grid->created_at('创建时间');

        $grid->disableRowSelector();
        $grid->actions(function ($actions) {
            $actions->disableView();
        });

        return $grid;
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Focu);
        $form->image('image', '封面图');
        $form->url('url', '链接');
        $form->text('alt', '描述');
        $form->text('remark', '备注');

        $form->number('sort', '排序');
        $form->radio('place', '位置')->options([
            '0' => '轮播-1090X450',
            '1' => '优惠广告-250X271',
            '2' => '左侧广告1-250X390',
            '10' => '左侧广告2-347X310',
            '3' => '热门广告1-347X310',
            '4' => '热门广告2-656X310',
            '9' => '热门广告3-347X310',
            '5' => '分类广告-250X340',
            '6' => '底部广告-670X190',
            '7' => '商品页头部广告-1370X300',
            '8' => '商品页左侧广告-250X390',
        ]);
        $form->radio('status', '状态')->options([
            '1' => '启',
            '0' => '禁',
        ]);

        $form->tools(function (Form\Tools $tools) {
            $tools->disableDelete();
            $tools->disableView();
        });
        $form->footer(function ($footer) {
            $footer->disableViewCheck();
            $footer->disableEditingCheck();
        });
        return $form;
    }
}
