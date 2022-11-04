<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFingerprintCodeToNetapps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('netapps', function (Blueprint $table) {
            $table->string('fingerprint_code')->after('certificate_url')->nullable();
            $table->string('docker_image_url')->after('docker_size')->nullable();
            $table->dropColumn('certificate_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('netapps', function (Blueprint $table) {
            //
        });
    }
}
