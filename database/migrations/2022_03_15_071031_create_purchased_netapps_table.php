<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasedNetappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchased_netapps', function (Blueprint $table) {
            $table->increments('id');
            $table->index('netapp_id');
            $table->index('payment_plan_id')->nullable();
            $table->index('user_id');
            $table->foreignId('user_id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreignId('netapp_id')
                ->on('netapps')
                ->onDelete('cascade');
            $table->foreignId('payment_plan_id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchased_netapps');
        Schema::dropForeign('purchased_netapps_netapp_id_foreign');
        Schema::dropIndex('purchased_netapps_netapp_id_index');
        Schema::dropColumn('netapp_id');
        Schema::dropForeign('purchased_netapps_user_id_foreign');
        Schema::dropIndex('purchased_netapps_user_id_index');
        Schema::dropColumn('user_id');
        Schema::dropForeign('purchased_netapps_payment_plan_id_foreign');
        Schema::dropIndex('purchased_netapps_payment_plan_id_index');
        Schema::dropColumn('payment_plan_id');
    }
}
