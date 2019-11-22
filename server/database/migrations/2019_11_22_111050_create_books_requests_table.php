<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('book_id')->nullable();
            $table->unsignedInteger('request_id')->nullable();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('CASCADE');
            $table->foreign('request_id')->references('id')->on('requests')->onDelete('CASCADE');
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
        Schema::dropIfExists('books_requests');
    }
}
