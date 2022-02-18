<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiEndpoint extends Model
{
    use HasFactory;
    protected $fillable = ['url'];
    public function netapps()
    {
        return $this->belongsToMany(Netapp::class);
    }
}
