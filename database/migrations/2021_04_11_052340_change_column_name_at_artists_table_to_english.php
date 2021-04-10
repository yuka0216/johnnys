<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnNameAtArtistsTableToEnglish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artists', function (Blueprint $table) {
            $table->renameColumn('名前', 'name');
            $table->renameColumn('グループ', 'group');
            $table->renameColumn('誕生日', 'birthday');
            $table->renameColumn('血液型', 'blood_type');
            $table->renameColumn('入所日', 'joined_date');
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
            $table->renameColumn('name', '名前');
            $table->renameColumn('group', 'グループ');
            $table->renameColumn('birthday', '誕生日');
            $table->renameColumn('blood_type', '血液型');
            $table->renameColumn('joined_date', '入所日');
        });
    }
}
