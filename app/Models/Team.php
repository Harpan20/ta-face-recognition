<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['position_id', 'name', 'image'];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function getImage()
    {
        return "/storage/" . $this->image;
    }
}
