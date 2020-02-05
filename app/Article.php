<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    public function getContentJsonAttribute($extra)
    {
        return array_values(json_decode($extra, true) ?: []);
    }

    public function setContentJsonAttribute($extra)
    {
        $this->attributes['extra'] = json_encode(array_values($extra));
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'uid');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'article_id', 'id');
    }
}
