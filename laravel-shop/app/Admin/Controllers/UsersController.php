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
/*    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }*/
    public function index(Content $content)
    {
        return $content
            ->header('用户列表')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
/*    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }*/

    /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
/*    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }*/

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
/*    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }*/

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);
        //创建一个列名为ID的列，内容是用户的id字段，并可以在前端页面点击排序
        $grid->id('Id')->sortable();
        //创建一个列名为 用户名的列，内容是用户的name字段，下面的email（）和create_at同理
        $grid->name('用户名');
        $grid->email('邮箱');
        $grid->email_verified('已验证邮箱')->display(function ($value) {
            return $value ? '是' : '否';
        });
//        $grid->password('Password');
//        $grid->remember_token('Remember token');

        $grid->created_at('注册时间');
        //不在页面显示‘新建’按钮，因为我们不需要在后台新建用户
        $grid->disableCreateButton();
        $grid->actions(function ($actions) {
            $actions->disableView();
            //不在每一行后面展示删除按钮
            $actions->disableDelete();
            //不在每一行后面展示编辑按钮
            $actions->disableEdit();
        });
        $grid->tools(function ($tools) {
            //禁止批量删除按钮
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });
//        $grid->updated_at('Updated at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
/*    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->id('Id');
        $show->name('Name');
        $show->email('Email');
        $show->password('Password');
        $show->remember_token('Remember token');
        $show->email_verified('Email verified');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }*/

    /**
     * Make a form builder.
     *
     * @return Form
     */
/*    protected function form()
    {
        $form = new Form(new User);

        $form->text('name', 'Name');
        $form->email('email', 'Email');
        $form->password('password', 'Password');
        $form->text('remember_token', 'Remember token');
        $form->switch('email_verified', 'Email verified');

        return $form;
    }*/
}
