<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index(Request $request)
    {

        $article = Article::with([
            'user',
            'comment' => function($query){
                $query->with('user');
            }
        ])->find($request->id);
        $content = json_decode($article->content, true);
        foreach ($content as $key => $value) {
            // 前言
            if($key == 'preface') {
                preg_match_all('/<p>.*?<\/p>/', $value['preface_content'], $tmp);
                foreach ($tmp[0] as $k => $v) {
                    $num = preg_match_all('/<img/', $v);
                    if ($num > 1) {
                        $tmp[0][$k] = substr($v, 3, strlen($v) - 4);
                    } elseif ($num > 0) {
                        $tmp[0][$k] = substr($v, 3, strlen($v) - 9).' style="width:100%;"'.' />';
                    }
                }
                $content['preface']['preface_content'] = $tmp[0];
            }
            // 行程介绍
            if($key == 'arrange') {
                foreach ($value as $key => $val) {
                    preg_match_all('/<p>.*?<\/p>/', $val['trip_content'], $tmp);
                    foreach ($tmp[0] as $k => $v) {
                        $num = preg_match_all('/<img/', $v);
                        if ($num > 1) {
                            $tmp[0][$k] = substr($v, 3, strlen($v) - 4);
                        } elseif($num > 0) {
                            $tmp[0][$k] = substr($v, 3, strlen($v) - 9).' style="width:100%;"'.' />';
                        }
                    }
                    $content['arrange'][$key]['trip_content'] = $tmp[0];
                }
            }

            // 注意事项
            if($key == 'take_care') {
                preg_match_all('/<p>.*?<\/p>/', $value['take_care_content'], $tmp);
                foreach ($tmp[0] as $k => $v) {
                    $num = preg_match_all('/<img/', $v);
                    if ($num > 1) {
                        $tmp[0][$k] = substr($v, 3, strlen($v) - 4);
                    } elseif($num > 0) {
                        $tmp[0][$k] = substr($v, 3, strlen($v) - 9).' style="width:100%;"'.' />';
                    }

                }
                $content['take_care']['take_care_content'] = $tmp[0];
            }
        }

        $comment = [];
        // 处理评论
        foreach ($article->comment as $key => $val) {
            preg_match_all('/<p>.*?<\/p>/', $val['content'], $tmp);
            foreach ($tmp[0] as $k => $v) {
                $num = preg_match_all('/<img/', $v);
                if ($num) {
                    $tmp[0][$k] = substr($v, 3, strlen($v) - 9).' style="width:100%;"'.' />';
                }

            }
            $comment[$key]['content'] = $tmp[0];
        }

        $article->content = $content;
        $article->item_comment = $comment;
        return view('article', [
            'article' => $article
        ]);
    }
}
