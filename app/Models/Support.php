<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Support extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'icon'];

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'icon' => handle_get_image_from_db($this->icon),
        ];
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function getIcon()
    {
        return "/storage/" . $this->icon;
    }
}
