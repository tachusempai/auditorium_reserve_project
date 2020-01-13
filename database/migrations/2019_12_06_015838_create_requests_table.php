<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_request');
            $table->unsignedBigInteger('type_request_id');
            $table->foreign('type_request_id')->references('id')->on('type_requests')->onDelete('cascade');
            $table->unsignedBigInteger('state_request_id');
            $table->foreign('state_request_id')->references('id')->on('state_requests')->onDelete('cascade');
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
        Schema::dropIfExists('requests');
    }
}
