<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {

            $table->bigIncrements('id')->unsigned(); //may need to change back to bigIncrements
            $table->string('name');
            $table->date('DOB');
            $table->enum('type', ['cat','dog','reptile','frog','turtle','insect'])->default('null');
            $table->string('description');
            $table->binary('picture');
            $table->enum('availability', ['available', 'not available'])->default('available');
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
        Schema::dropIfExists('animals');
    }
}
