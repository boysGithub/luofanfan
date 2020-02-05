<?php

namespace App\Admin\Controllers;

use App\Article;
use App\Comment;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CommentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Comment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Comment());
        $grid->column('id', __('Id'));
        $grid->column('article.title', __('文章'));
        $grid->column('user.name', __('用户'));
        $grid->column('content', __('内容'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        // 去掉不必要的操作
        $grid->actions(function ($actions) {
            // 去掉查看
            $actions->disableView();
        });

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
        $show = new Show(Comment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('article_id', __('Article id'));
        $show->field('user_id', __('User id'));
        $show->field('content', __('Content'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Comment());
        $form->setView('admin.comment');
        $form->select('article_id', __('文章'))->options(Article::all()->pluck('title', 'id'));
        $form->select('user_id', __('用户'))->options(User::where('type', 0)->get()->pluck('name', 'id')->toArray());
        $form->UEditor('content', __('内容'));

        return $form;
    }
}
