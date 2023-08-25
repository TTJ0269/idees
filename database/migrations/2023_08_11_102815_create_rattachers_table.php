<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRattachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rattachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('responsable_id');
            $table->Date('date')->default(now());
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sujet_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sujet_id')->references('id')->on('sujets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rattachers');
    }
}
