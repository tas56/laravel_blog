<?php

namespace App\Models;

use App\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id', 'title', 'body', 'published'
    ];
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if(Auth::id() != null) {
                $model->user_id = Auth::id();
            }
        });
        static::updating(function ($model) {
            $model->user_id = Auth::id();
        });
    }
    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

}
