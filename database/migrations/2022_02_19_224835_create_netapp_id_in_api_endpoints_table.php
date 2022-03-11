<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetappIdInApiEndpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('api_endpoints', function (Blueprint $table) {
            $table->index('netapp_id');
            $table->foreignId('netapp_id')
                ->on('netapps')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('api_endpoints', function (Blueprint $table) {
            Schema::dropForeign('api_endpoints_netapp_id_foreign');
            Schema::dropIndex('api_endpoints_netapp_id_index');
            Schema::dropColumn('netapp_id');
        });
    }
}
