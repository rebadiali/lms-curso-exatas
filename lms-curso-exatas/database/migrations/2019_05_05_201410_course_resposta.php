<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CourseResposta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('CourseResposta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table -> integer('question_id')->references('id')->on('CourseQuestion');
			$table -> string('resposta');
			$table -> boolean('correto');
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
         Schema::dropIfExists('CourseResposta');
    }
}
