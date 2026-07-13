<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    public static $rules = [
        "title" => ["required"],
        "body" => ["required"],
        "image" => ["image"],
    ];

    public static $messages = [
        "title.required" => "タイトルが入力されていません",
        "body.required" => "本文が入力されていません",
        "image.image" => "画像をアップロードしてください",
    ];
}
