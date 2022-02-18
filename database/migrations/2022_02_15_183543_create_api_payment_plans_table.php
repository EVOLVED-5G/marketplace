<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiPaymentPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_payment_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('from');   //from n number of api requests
            $table->bigInteger('to');     //to n number of api requests
            $table->boolean('unlimited');
            $table->bigInteger('cost');   //cost per api call
            $table->string('plan_category');   //type of plan
            $table->index('api_endpoint_id');
            $table->foreignId('api_endpoint_id')
                ->on('api_endpoints')
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
        Schema::dropIfExists('api_payment_plans');
        Schema::dropForeign('api_payment_plans_api_endpoint_id_foreign');
        Schema::dropIndex('api_payment_plans_api_endpoint_id_index');
        Schema::dropColumn('api_endpoint_id');
    }
}
