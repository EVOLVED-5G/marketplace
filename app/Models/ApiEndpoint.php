<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiEndpoint extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'netapp_id'];
    public function netapps()
    {
        return $this->belongsToMany(Netapp::class);
    }
    public function paymentplan()
    {
        return $this->hasMany(ApiPaymentPlan::class);
    }
}
