<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetappApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_endpoint_netapp', function (Blueprint $table) {
            $table->increments('id');
            $table->index('netapp_id');
            $table->index('api_endpoint_id');
            $table->foreignId('api_endpoint_id')
                ->on('api_endpoints')
                ->onDelete('cascade');
            $table->foreignId('netapp_id')
                ->on('netapps')
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
        Schema::dropIfExists('netapp_apis');
        Schema::dropForeign('netapp_apis_api_endpoint_id_foreign');
        Schema::dropIndex('netapp_apis_api_endpoint_id_index');
        Schema::dropColumn('api_endpoint_id');
        Schema::dropForeign('netapp_apis_netapp_id_foreign');
        Schema::dropIndex('netapp_apis_netapp_id_index');
        Schema::dropColumn('netapp_id');
    }
}
