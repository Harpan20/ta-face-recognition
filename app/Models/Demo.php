<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'country_id',
        'product_id',
        'name',
        'company_name',
        'email',
        'number',
        'industry',
        'needs',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
