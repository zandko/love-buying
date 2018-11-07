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
        $grid->id('ID');

        $grid->name('名称')->display(function ($name) {
            return str_repeat("&nbsp;",$this->level*8).$name;
        });
        $grid->column('parent.name', '上级分类');
        $grid->is_directory('是否有子级分类')->display(function ($is_directory) {
            return $is_directory ? '是' : '否';
        });
        $grid->level('级别');
        $grid->path('路径');
        $grid->created_at('添加时间');
        $grid->updated_at('修改时间');

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
        $category_data = Category::all();
        $category = [];
        foreach($category_data as $v)
        {
            $category[$v['id']] = $v->full_name;
        }

        $form = new Form(new Category);

        $form->text('name', '名称');
        $form->select('parent_id', '上级分类')->options($category);
        $form->radio('is_directory','是否有子级分类')->options(['1'=>'是','0'=>'否']);
        return $form;
    }
}
