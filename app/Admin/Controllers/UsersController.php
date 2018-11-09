<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UsersController extends Controller
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
            ->header('用户')
            ->description('列表')
            ->body($this->grid());
    }


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->model()->orderBy('id','desc');
        $grid->id('ID')->sortable();
        $grid->firstname('名字');
        $grid->name('用户名');
        $grid->email('邮箱');
        $grid->email_verified('是否验证')->display(function ($email_verified) {
            return $email_verified ? '是' : '否';
        });
        $grid->created_at('注册时间');
        $grid->disableRowSelector();
        $grid->disableActions();
        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableDelete();
            $actions->disableEdit();
        });
        return $grid;
    }
    
}
