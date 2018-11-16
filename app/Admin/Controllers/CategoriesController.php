<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CategoriesController extends Controller
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
            ->header('分类')
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
            ->description('分类')
            ->body($this->form($id)->edit($id));
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
            ->description('分类')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category);

        $grid->filter(function ($filter) {
            $filter->like('name','名称');
        });
        $grid->id('ID')->sortable();
        $grid->name('名称')->display(function ($name) {
            if($this->ico) 
            {
                return str_repeat("&nbsp;",$this->level*8)."<img src='{$this->ico_url}'>".$name;
            }else {
                return str_repeat("&nbsp;",$this->level*8).$name;
            }
        });
        $grid->column('parent.name', '上级分类');
        $grid->is_directory('是否有子级分类')->display(function ($is_directory) {
            return $is_directory ? '是' : '否';
        });

        $grid->order('是否楼层')->display(function ($order) {
            return $order ? '是' : '否';
        })->sortable();
        $grid->level('级别');
        $grid->path('路径');
        $grid->created_at('添加时间')->sortable();
        $grid->updated_at('修改时间')->sortable();

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
    protected function form($isEditing = false)
    {
        $category_data = Category::all();
        $category_name = [];
        foreach($category_data as $v)
        {
            $category_name[$v['id']] = $v->full_name;
        }

        $form = new Form(new Category);
        $form->text('name', '名称')->rules('required');
        $form->image('ico', '图标');
        $form->radio('order','是否楼层')->options(['1'=>'是','0'=>'否'])->rules('required');

        if($isEditing) {
            $form->display('parent.name','上级分类');

            $form->display('is_directory','是否有子级分类')->with(function ($is_directory) {
                return $is_directory ? '是' : '否';
            });
        }else {
            $form->select('parent_id', '上级分类')->options($category_name);
            $form->radio('is_directory','是否有子级分类')->options(['1'=>'是','0'=>'否'])->rules('required');
        }

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
