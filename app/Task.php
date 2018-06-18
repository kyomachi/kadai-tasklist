<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['content', 'status', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

/*
class Message extends Model { // } と書かれているだけで中身がない空クラスに思えますが、
実は extends している Illuminate\Database\Eloquent\Model に
多くの関数やパラメータが予め定義されているのです。

更に Message モデル個別の機能が必要な場合にのみ上記の // 部分に関数を追加していくことになります。
*/