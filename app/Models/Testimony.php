<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimony extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'position',
        'origin',
        'testimony',
        'image',
    ];

    public function formatedDateDFH()
    {
        return $this->updated_at->diffForHumans();
    }

    public function getImage()
    {
        return "/storage/" . $this->image;
    }
}
