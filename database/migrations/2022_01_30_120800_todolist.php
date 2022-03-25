<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Todolist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('todolist', function (Blueprint $table) {
          $table->id();
          $table->integer('user_id');
          $table->text('discription');
          $table->boolean('mark_as_completed');
          $table->timestamps();
          $table->softDeletes();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('todolist');
    }
}
