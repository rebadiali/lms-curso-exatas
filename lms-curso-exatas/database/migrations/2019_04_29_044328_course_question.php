<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CourseQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('CourseQuestion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table -> integer('tema_id')->references('id')->on('CourseTemas');
            $table -> string('Titulo');
			$table -> string('Pergunta');
			$table -> string('Resposta');
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
               Schema::dropIfExists('CourseQuestion');
    }
}
