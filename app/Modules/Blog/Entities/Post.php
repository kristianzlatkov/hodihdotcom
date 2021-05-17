<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\PostFactory::new();
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
