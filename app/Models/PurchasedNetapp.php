<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedNetapp extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'netapp_id', 'payment_plan_id', 'hash', 'blockchain_transaction_url'];
    public function netapp()
    {
        return $this->belongsTo(Netapp::class, 'netapp_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
