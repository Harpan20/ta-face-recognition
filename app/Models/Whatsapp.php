<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Whatsapp extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['country_id', 'number', 'is_main'];
    protected $with = ['country'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
