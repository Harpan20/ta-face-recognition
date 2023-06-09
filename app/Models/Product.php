<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Requests\StoreProductRequest;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image_hero',
        'image_feature',
        'image_benefit',
        'image_benefit_mobile',
    ];
    protected $with = [
        'demos',
        'features',
        'benefits',
        'advantages',
        'supports',
        'faqs',
    ];

    // relation

    public function demos()
    {
        return $this->hasMany(Demo::class);
    }

    public function promoClaims()
    {
        return $this->hasMany(PromoClaim::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function benefits()
    {
        return $this->belongsToMany(Benefit::class);
    }

    public function advantages()
    {
        return $this->belongsToMany(Advantage::class);
    }

    public function supports()
    {
        return $this->belongsToMany(Support::class);
    }

    public function faqs()
    {
        return $this->belongsToMany(Faq::class);
    }

    // function

    public function formatedDateDFH()
    {
        return $this->updated_at->diffForHumans();
    }

    public function getImageHero()
    {
        return "/storage/" . $this->image_hero;
    }

    public function getImageFeature()
    {
        return "/storage/" . $this->image_feature;
    }

    public function getImageBenefit()
    {
        return "/storage/" . $this->image_benefit;
    }

    // api
    /*
        * change id to slug on show route api
    */
    /*
        public function getRouteKeyName()
        {
            return 'slug';
        }
    */
}
