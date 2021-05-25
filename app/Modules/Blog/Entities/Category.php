<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [];

    public static function whereHas(\Closure $param)
    {
    }

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\CategoryFactory::new();
    }

    public function post()
    {
        return $this->hasMany(Post::class,'id','category_id');
    }
}
