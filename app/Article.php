<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
//    public function getTagAttribute($value)
//    {
//        return explode(',', $value);
//    }
//
//    public function setTagAttribute($value)
//    {
//        $this->attributes['tag'] = implode(',', $value);
//    }

    public function getContentJsonAttribute($extra)
    {
        return array_values(json_decode($extra, true) ?: []);
    }

    public function setContentJsonAttribute($extra)
    {
        $this->attributes['extra'] = json_encode(array_values($extra));
    }
}
