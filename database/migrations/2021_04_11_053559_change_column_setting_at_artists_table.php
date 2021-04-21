<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnSettingAtArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artists', function (Blueprint $table) {
            $table->string('name', 10)->nullable(false)->change();
            $table->string('group', 10)->nullable(false)->change();
            $table->date('birthday')->nullable(false)->change();
            $table->string('blood_type', 2)->nullable(false)->change();
            $table->date('joined_date')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artists', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('group')->nullable()->change();
            $table->date('birthday')->nullable()->change();
            $table->string('blood_type')->nullable()->change();
            $table->date('joined_date')->nullable()->change();
        });
    }
}
