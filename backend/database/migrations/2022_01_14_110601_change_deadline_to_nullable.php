<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDeadlineToNullable extends Migration
{
    /**
     * Run the migrations.
     *
     *
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->date('deadline')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *https://qiita.com/nakaji0210/items/7e5352bdb1dabd471cc7
     *
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->date('deadline')->nullable(false)->change();
        });
    }
}
