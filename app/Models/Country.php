<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'code', 'dial_code'];

    public function phoneNumbers()
    {
        return $this->hasMany(PhoneNumber::class);
    }

    public function contactForms()
    {
        return $this->hasMany(ContactForm::class);
    }

    public function demos()
    {
        return $this->hasMany(Demo::class);
    }
}
