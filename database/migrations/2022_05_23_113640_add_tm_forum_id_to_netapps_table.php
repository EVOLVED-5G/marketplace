<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTmForumIdToNetappsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('netapps', function (Blueprint $table) {
            $table->string('tm_forum_id')->nullable()->after('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('netapps', function (Blueprint $table) {
            $table->dropColumn(['tm_forum_id']);
        });
    }
}
