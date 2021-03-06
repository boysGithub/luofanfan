<?php

namespace App\Admin\Controllers;

use App\Article;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Field\Interaction\FieldTriggerTrait;
use Field\Interaction\FieldSubscriberTrait;

class ArticleController extends AdminController
{
    use FieldTriggerTrait, FieldSubscriberTrait;
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());

        $grid->column('id', __('Id'));
        $grid->column('web_title', __('网页头设置'));
        $grid->column('keywords', __('关键字设置'));
        $grid->column('title', __('文章标题'));
        $grid->column('trip', __('出行时间'));
        $grid->column('method', __('月份'));
        $grid->column('cost', __('费用'));
        $grid->column('type', __('出行方式'));
        $grid->column('tag', __('标签'));
        $grid->column('read_count', __('阅读数'));
        $grid->column('uid', __('客服'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));

        // 去掉不必要的操作
        $grid->actions(function ($actions) {
            // 去掉删除
            $actions->disableDelete();
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
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('web_title', __('网页头设置'));
        $show->field('keywords', __('关键字设置'));
        $show->field('title', __('文章标题'));
        $show->field('trip', __('出行时间'));
        $show->field('method', __('月份'));
        $show->field('cost', __('费用'));
        $show->field('type', __('出行方式'));
        $show->field('tag', __('标签'));
        $show->field('read_count', __('阅读数'));
        $show->field('uid', __('客服'));
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('修改时间'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article());
        $user = User::where('type', 1)->get();
        $form->fieldset('网站信息设置', function (Form $form) {
            $form->text('web_title', __('网页头设置'))->required();
            $form->tags('keywords', __('关键字设置'))->required();
            $form->text('url_name', __('访问路由'))->required();
        });
        $form->fieldset('文章基本信息设置', function (Form $form) {
            $form->image('bg_img', __('背景图片'))->uniqueName()->required();
            $form->text('title', __('文章标题'))->required();
            $form->select('trip', __('出行天数'))->options([
                1 => 1,2 => 2,3 => 3,4 => 4,5 => 5,6 => 6,7 => 7,8 => 8,9 => 9,10 => 10
            ])->required();
            $form->text('method', __('月份'))->required();
            $form->text('cost', __('费用'))->required();
            $form->text('type', __('出行方式'))->required();
            $form->tags('tag', __('标签'));
            $form->text('read_count', __('阅读数'))->default('10');
        });

        $form->fieldset('客服信息设置', function (Form $form) use ($user) {
            $form->select('uid', __('客服'))->options($user->pluck('name', 'id'))->required();
        });
        $form->UEditor('content');
        return $form;
    }

    public function a($form)
    {
        $tmp = [];
        /*整理提取后台展示内容*/
        // 提取前言
        $tmp['preface'] = [
            'preface_title' => $form->preface_title,
            'preface_content' => $form->preface_content,
        ];
        // 提取行程简介
        $tmp['itinerary'] = $this->itinerary($form);
        // 提取行程介绍
        $tmp['arrange'] = $this->arrange($form);
        // 注意事项
        $tmp['take_care'] = [
            'take_care_title' => $form->take_care_title,
            'take_care_content' => $form->take_care_content
        ];

        return $tmp;
    }

    /**
     * 提取行程
     * @param $form
     * @return array
     */
    public function itinerary($form)
    {
        $tmp = [];
        for ($i = 1; $i <= $form->trip; $i ++) {
            $key = "D{$i}";
            $tmp[$key] = $form->$key;
        }
        return $tmp;
    }

    /**
     * 提取行程安排
     * @param $form
     * @return array
     */
    public function arrange($form)
    {
        $tmp = [];
        for ($i = 1; $i <= $form->trip; $i ++) {
            $key = "D{$i}";
            $key1 = "trip_title_{$i}";
            $key2 = "trip_content_{$i}";
            $tmp[$key]['trip_title'] = $form->$key1;
            $tmp[$key]['trip_content'] = $form->$key2;
        }
        return $tmp;
    }

    public function preface($form)
    {

//        $arr = [];
//        $str = $form->preface;
//        preg_match_all('/<p>.*?<\/p>/im', $str, $matches);
//        $tmp = [];
//        $i = 0;
//        foreach ($matches[0] as $key => $val) {
//            $num = substr_count($val, '<img');
//            if ( $num > 0) {
//                $arr[] = array_slice($matches[0], $i, ($key - $i));
//                $arr[] = 'img|';
//                $i = $key + 1;
//                $tmp[$key] = $num;
//            }
//        }
//        dd($arr);
//        dd($matches, $tmp);
//        $i = 0;
//        foreach ($tmp as $k => $v) {
//            $arr['content'][] =
//        }
//        $i = 0;
//        while ($i < count($tmp)){
//            $j = $i + 1;
//            while ($j < count($tmp) && $tmp[$j-1] == $tmp[$j]) {
//                $j++;
//            }
//            $imgGroup[] = [$tmp[$i], $tmp[$j]];
//        }
//        dd($imgGroup);
//        //
//        if (count($tmp) > 1) {
//            for ($i=0; $i < count($tmp); $i++) {
//                if ($i + 1 == count($tmp)) {
//                    if ($tmp[$i] - 1 == $tmp[$i - 1]) {
//                        $str = end($imgGroup);
//                        unset($imgGroup[count($imgGroup) - 1]);
//                        $imgGroup[] = $str.','.$tmp[$i];
//                    } else {
//                        $imgGroup[] = $tmp[$i];
//                    }
//                } else {
//                    if ($tmp[$i] + 1 != $tmp[$i+1]) {
//                        $imgGroup[] = $tmp[$i];
//                        $imgGroup[] = $tmp[$i+1];
//                    } else {
//                        $imgGroup[] = $tmp[$i].','.$tmp[$i+1];
//                        ++$i;
//                    }
//                }
//            }
//        }
    }
}
