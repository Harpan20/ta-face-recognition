<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'post_type_id',
        'title',
        'slug',
        'excerpt',
        'body',
        'image_hero',
        'image_l',
        'image_s',
        'published_at',
        'is_publish',
    ];
    protected $with = [
        'category',
        'postType',
        'tags',
    ];
    protected $dates = ['published_at'];

    public function formatedDateDFH()
    {
        return $this->updated_at->diffForHumans();
    }

    public function getImageHero()
    {
        return "/storage/" . $this->image_hero;
    }

    public function getImageL()
    {
        return "/storage/" . $this->image_l;
    }

    public function getImageS()
    {
        return "/storage/" . $this->image_s;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function postType()
    {
        return $this->belongsTo(PostType::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
