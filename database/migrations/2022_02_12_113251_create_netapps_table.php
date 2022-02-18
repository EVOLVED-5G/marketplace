<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('netapps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('about');
            $table->string('version');
            $table->json('tags');
            $table->string('url_site');
            $table->string('business_name')->nullable();
            $table->string('social_number')->nullable();
            $table->string('published_by');
            $table->boolean('policy')->default(false);
            $table->string('docker_image_url');
            $table->string('certificate_url');
            $table->string('docker_size');
            $table->integer('fix_price')->nullable();
            $table->index('type_id');
            $table->index('user_id');
            $table->index('category_id');
            $table->longText('tutorial_docs');
            $table->foreignId('category_id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('type_id')
                ->on('netapp_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('user_id')
                ->on('users')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('netapps');
        Schema::dropForeign('netapps_category_id_foreign');
        Schema::dropIndex('netapps_cateogory_id_index');
        Schema::dropColumn('category_id');
        Schema::dropForeign('netapps_type_id_foreign');
        Schema::dropIndex('netapps_type_id_index');
        Schema::dropColumn('type_id');
        Schema::dropForeign('netapps_user_id_foreign');
        Schema::dropIndex('netapps_user_id_index');
        Schema::dropColumn('user_id');
    }
}
