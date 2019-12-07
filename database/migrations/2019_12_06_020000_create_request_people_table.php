<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name_person');
            $table->text('last_name_person');
            $table->text('job');
            $table->text('area');
            $table->text('office_phone');
            $table->text('cell_phone');
            $table->text('name_institution');
            $table->text('email');
            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade');
            $table->unsignedBigInteger('type_people_id');
            $table->foreign('type_people_id')->references('id')->on('type_people')->onDelete('cascade');
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
        Schema::dropIfExists('request_people');
    }
}
