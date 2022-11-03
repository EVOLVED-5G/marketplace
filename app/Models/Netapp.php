<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Netapp extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'about',
        'url_site',
        'category_id',
        'published_by',
        'version',
        'business_name',
        'social_number',
        'github_url',
        'docker_size',
        'certificate_url',
        'policy',
        'tutorial_docs',
        'fix_price',
        'type_id',
        'tags',
        'slug',
        'visible',
        'user_id',
    ];
    public function savedNetapp()
    {
        if (auth()->check()) {
            return $this->hasOne(SavedNetapp::class)->where('user_id', auth()->user()->id);
        }
        return $this->hasOne(SavedNetapp::class)->whereNull('id');
    }
    public function purchasedNetapp()
    {
        if (auth()->check()) {
            return $this->hasOne(PurchasedNetApp::class)->where('user_id', auth()->user()->id);
        }
        return $this->hasOne(PurchasedNetApp::class)->whereNull('id');
    }
    public function scopeActive($query)
    {

        // if (auth()->check()) {
        //     if ($this->user_id == auth()->user()->id) {
        //         return $query->where('user_id', auth()->user()->id);
        //     }
        // } else {
            return $query->where('visible', '=', 1);
        // }
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function logo()
    {
        return $this->morphMany('App\Models\Image', 'imageable')->where('type', 'logo');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getTagsAttribute($value)
    {
        return $this->attributes['tags'] = json_decode($value);
    }
    public function type()
    {
        return $this->belongsTo(NetappType::class);
    }
    public function license()
    {
        return $this->morphMany(Document::class, 'documentable')->where('type', 'license')->latest();
    }
    public function pdf()
    {
        return $this->morphMany(Document::class, 'documentable')->where('type', 'tutorial_docs');
    }
    public function apiEndpoints()
    {
        return $this->hasMany(ApiEndpoint::class);
    }
    public function paymentplan()
    {
        return $this->hasManyThrough(ApiPaymentPlan::class, ApiEndpoint::class);
    }
}
