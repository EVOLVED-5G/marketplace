<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedNetapp extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'netapp_id'];
    public function netapp()
    {
        return $this->belongsTo(Netapp::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
