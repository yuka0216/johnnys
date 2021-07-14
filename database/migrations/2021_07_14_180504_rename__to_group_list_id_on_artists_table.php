<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameToGroupListIdOnArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artists', function (Blueprint $table) {
            $table->renameColumn('group', 'group_list_id');
            $table->renameColumn('blood_type', 'blood_type_id');
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
            $table->renameColumn('group_list_id', 'group');
            $table->renameColumn('blood_type_id', 'blood_type');
            //
        });
    }
}
