<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image_desktop',
        'image_mobile',
        'started_at',
        'ended_at',
        'is_publish',
    ];
    protected $dates = ['started_at', 'ended_at'];

    public function formatedStartedDateDFH()
    {
        return $this->started_at->format('d F, Y');
    }

    public function formatedEndedDateDFH()
    {
        return $this->ended_at->format('d F, Y');
    }
}
