<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('start_time');
			$table->string('end_time');
			$table->integer('capacity')->unsigned();
			$table->unsignedBigInteger('speaker_id')->nullable();
            $table->timestamps();
        });
		Schema::table('lectures', function(Blueprint $table) {
			$table->foreign('speaker_id')->references('id')->on('speakers')->onDelete('set null');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lectures');
    }
}
