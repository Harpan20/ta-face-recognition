<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class CompanyValue extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'image'];

    public function formatedUpdateDateCompanyValueDFH()
    {
        return $this->updated_at->diffForHumans();
    }

    public function getImage()
    {
        return "/storage/" . $this->image;
    }
}
