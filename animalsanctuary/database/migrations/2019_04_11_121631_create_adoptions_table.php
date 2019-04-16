<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adoptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userId');
            $table->string('name');
            $table->integer('animalId');
            $table->enum('adopted', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->timestamps();

            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('animalId')->references('id')->on('animals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adoptions');
    }
}
