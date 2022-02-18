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
        'docker_image_url',
        'docker_size',
        'certificate_url',
        'policy',
        'tutorial_docs',
        'fix_price',
        'type_id',
        'tags',
        'user_id'
    ];
    public function logo()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
    public function license()
    {
        return $this->morphMany(Document::class, 'documentable')->where('type', 'license');
    }
    public function tutorialDocs()
    {
        return $this->morphMany(Document::class, 'documentable')->where('type', 'tutorial_docs');
    }
    public function apiEndpoints()
    {
        return $this->belongsToMany(ApiEndpoint::class);
    }
}
