<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SnspostModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'snsposts';

    protected $fillable = [
        'user_id',
        'comment',
        'img_path',
    ];

    public static $rules = [
        'comment' => ['required'],
        'image' => ['nullable', 'image'],
    ];

    public static $messages = [
        'comment.required' => '本文を入力してください',
        'image.image' => '画像ファイルをアップロードしてください',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
