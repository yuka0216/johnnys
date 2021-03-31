<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AllCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allComments', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('comment_id');
            $table->string('comment');
            $table->string('image_path')->nullable();
            $table->string('commented_at');
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
        Schema::dropIfExists('allComments');
    }
}
