<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sample extends Model
{
    use HasFactory;
    use SoftDeletes;

    public static $rules = [
        "title" => ["required"],
        "body"  => ["required"],
        "image" => ["required", "image"],
    ];

    public static $messages = [
        "title.required" => "タイトルを入力してください",
        "body.required"  => "本文を入力してください",
        "image.required" => "画像をアップロードしてください",
        "image.image" => "画像ファイルをアップロードしてください",
    ];
}
