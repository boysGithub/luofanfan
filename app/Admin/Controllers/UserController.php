<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('name', __('名称'));
        $grid->column('email', __('邮箱'));
        $grid->column('avatar', __('头像'));
        $grid->column('sex', __('性别'))->radio([1 => '男', 2 => '女']);
        $grid->column('level', __('等级'));
        $grid->column('weixin', __('微信号'));
        $grid->column('stay_count', __('发表次数'));
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('avatar', __('Avatar'));
        $show->field('level', __('Level'));
        $show->field('weixin', __('Weixin'));
        $show->field('love', __('Love'));
        $show->field('stay_count', __('Stay count'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('sex', __('Sex'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());
        $form->text('name', __('名字'));
        $form->image('avatar', __('头像'))->uniqueName();
        $form->text('level', __('等级'))->default('1');
        $form->text('weixin', __('微信号'));
        $form->text('love', __('被点赞数'))->default('124');
        $form->text('stay_count', __('评论总数'))->default('8172');
        $form->radio('sex', __('性别'))->options([1 => '男', 2 => '女']);

        return $form;
    }
}
