<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavedNetappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_netapps', function (Blueprint $table) {
            $table->increments('id');
            $table->index('netapp_id');
            $table->index('user_id');
            $table->foreignId('user_id')
                ->on('users')
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
        Schema::dropIfExists('saved_netapps');
        Schema::dropForeign('saved_netapps_netapp_id_foreign');
        Schema::dropIndex('saved_netapps_netapp_id_index');
        Schema::dropColumn('netapp_id');
        Schema::dropForeign('saved_netapps_user_id_foreign');
        Schema::dropIndex('saved_netapps_user_id_index');
        Schema::dropColumn('user_id');
    }
}
