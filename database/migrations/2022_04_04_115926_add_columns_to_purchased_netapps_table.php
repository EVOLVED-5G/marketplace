<?php

use App\BusinessLogicLayer\PurchasedNetapp\PurchasedNetappManager;
use App\Models\PurchasedNetapp;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPurchasedNetappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchased_netapps', function (Blueprint $table) {
            $table->string('hash')->after('payment_plan_id')->nullable();
            $table->string('blockchain_transaction_url')->after('hash')->nullable();
        });

        $purchasedNetappManager = app()->make(PurchasedNetappManager::class);
        $purchasedNetapps = PurchasedNetapp::all();
        foreach ($purchasedNetapps as $purchasedNetapp) {
            $hash = $purchasedNetappManager->getHashForPurchasedNetapp($purchasedNetapp);
            $purchasedNetapp->hash = $hash;
            $purchasedNetapp->save();
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchased_netapps', function (Blueprint $table) {
            //
        });
    }
}
