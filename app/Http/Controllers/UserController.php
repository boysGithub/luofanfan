<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getWeChatInfo(Request $request)
    {


        $validatedData = Validator::make($request->all(), [
            'id' => 'required|integer|min:1|max:10000'
        ]);
        if ($validatedData ->fails()) {
            return response()->json([
                'msg' => '你中毒了，快点杀毒吧'
            ], 400);
        }
        $user = User::find($request->id);
        return response()->json([
            "status" => "success",
            'info' => [
                "wximg" => "",
                "id" => $user->id,
                "wechat_id" => 2027,
                "wxnumber" => $user->weixin,
                "nickname" => $user->name,
                "brand_nickname" => $user->name,
                "wechat_sex" => $user->sex,
                "code" => env('APP_URL')."/storage/".$user->weixin_avatar,
                "wechat_header_img" => env('APP_URL')."/storage/".$user->avatar
            ],
        ]);
    }
}
