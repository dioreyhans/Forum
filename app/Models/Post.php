<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Comment;
use Illuminate\Database\Eloquent\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function comment(){
        return $this->belongsToMany('App\Models\Comment','comments', 'user_id', 'posts_id');
    }
    public function Category(){
        return $this->hasOne('App\Models\Category');
    }
}
