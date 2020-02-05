<?php

namespace App\Admin\Actions\User;

use App\User;
use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserCreate extends RowAction
{
    public $name = '生成用户';

    public function handle(Model $model, Request $request)
    {
        factory(User::class, (int)$request->number)->create();
        return $this->response()->success('Success message.')->refresh();
    }

    public function form()
    {
        $this->text('number', '数量')->rules('required|min:1');
    }

}
