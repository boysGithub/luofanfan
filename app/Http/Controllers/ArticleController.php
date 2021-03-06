<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index(Request $request)
    {

        $article = Article::where('url_name', $request->id)->with([
            'user',
            'comment' => function($query){
                $query->with('user');
            }
        ])->first();
        if (!$article) {
            $article = Article::where('url_name', 'jiuzaigou')->with([
                'user',
                'comment' => function($query){
                    $query->with('user');
                }
            ])->first();
        }

        $arr = [
            "[称谓]" => '<span class="bnname"></span>',
            "[微信名字]" => '<span class="wxname"></span>',
            "[微信号]" => '<span class="weixin"></span>',
            "[联系当地管家]" => '<span class="contact-blue JJLin">联系当地管家</span>',
            "[前言标题]" => '<div class="item hidem"><div class="item-note">',
            "[前言标题-end]" => '</div></div>',
            "[item]" => '<div class="item">',
            "[item-end]" => '</div>',
            "[item-bin]" => '<div class="item"><div class="mcimg">',
            "[item-bin-end]" => '</div></div>',
            "[行程简介]" => '<div class="item" id="xctitle">
                                <div class="span-box">
                                    <span class="line-blue"></span>
                                    <span class="span-title">行程简介</span>
                                </div>
                            </div>',
            "[D1]" => '<div class="title-box">
                <div class="box-blue">D1</div><p class="title-box-item">',
            "[D1-end]" => '</p></div>',
            "[D2]" => '<div class="title-box">
                <div class="box-blue">D2</div><p class="title-box-item">',
            "[D2-end]" => '</p></div>',
            "[D3]" => '<div class="title-box">
                <div class="box-blue">D3</div><p class="title-box-item">',
            "[D3-end]" => '</p></div>',
            "[D4]" => '<div class="title-box">
                <div class="box-blue">D4</div><p class="title-box-item">',
            "[D4-end]" => '</p></div>',
            "[D5]" => '<div class="title-box">
                <div class="box-blue">D5</div><p class="title-box-item">',
            "[D5-end]" => '</p></div>',
            "[D6]" => '<div class="title-box">
                <div class="box-blue">D6</div><p class="title-box-item">',
            "[D6-end]" => '</p></div>',
            "[D7]" => '<div class="title-box">
                <div class="box-blue">D7</div><p class="title-box-item">',
            "[D7-end]" => '</p></div>',
            "[D8]" => '<div class="title-box">
                <div class="box-blue">D8</div><p class="title-box-item">',
            "[D8-end]" => '</p></div>',
            "[D9]" => '<div class="title-box">
                <div class="box-blue">D9</div><p class="title-box-item">',
            "[D9-end]" => '</p></div>',
            "[D10]" => '<div class="title-box">
                <div class="box-blue">D10</div><p class="title-box-item">',
            "[D10-end]" => '</p></div>',
            "[行程介绍]" => '<div class="item">
            <div class="span-box">
                <span class="line-blue"></span>
                <span class="span-title">行程介绍</span>
            </div>
        </div>',
            "[第一天]" => '<div class="title-box2">
                <div class="box-blue2">第一天</div>',
            "[第一天-end]" => '</div>',
            "[第二天]" => '<div class="title-box2">
                <div class="box-blue2">第二天</div>',
            "[第二天-end]" => '</div>',
            "[第三天]" => '<div class="title-box2">
                <div class="box-blue2">第三天</div>',
            "[第三天-end]" => '</div>',
            "[第四天]" => '<div class="title-box2">
                <div class="box-blue2">第四天</div>',
            "[第四天-end]" => '</div>',
            "[第五天]" => '<div class="title-box2">
                <div class="box-blue2">第五天</div>',
            "[第五天-end]" => '</div>',
            "[第六天]" => '<div class="title-box2">
                <div class="box-blue2">第六天</div>',
            "[第六天-end]" => '</div>',
            "[第七天]" => '<div class="title-box2">
                <div class="box-blue2">第七天</div>',
            "[第七天-end]" => '</div>',
            "[第八天]" => '<div class="title-box2">
                <div class="box-blue2">第八天</div>',
            "[第八天-end]" => '</div>',
            "[第九天]" => '<div class="title-box2">
                <div class="box-blue2">第九天</div>',
            "[第九天-end]" => '</div>',
            "[第十天]" => '<div class="title-box2">
                <div class="box-blue2">第十天</div>',
            "[第十天-end]" => '</div>',

        ];

        foreach ($arr as $key => $item) {
            $article->content = str_replace($key, $item, $article->content);
        }

//        $tel = [
//
//            "[微信号]" => '<span class="weixin"></span>',
//            "[联系当地管家]" => '<span class="contact-blue JJLin">联系当地管家</span>'
//        ];

//        dd($article->content);
        return view('article', [
            'article' => $article
        ]);
    }
}
