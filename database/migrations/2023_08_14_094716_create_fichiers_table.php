<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichiers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libellefichier');
            $table->Integer('responsable_id');
            $table->string('urlfichier');
            $table->timestamps();

            $table->unsignedBigInteger('sujet_id');
            $table->unsignedBigInteger('commentaire_id');
            $table->foreign('sujet_id')->references('id')->on('sujets')->onDelete('cascade');
            $table->foreign('commentaire_id')->references('id')->on('commentaires')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fichiers');
    }
}
