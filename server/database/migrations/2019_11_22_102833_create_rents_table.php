<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('book_id')->nullable();
            $table->dateTime('from_date')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->unsignedInteger('rented_by')->nullable();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('CASCADE');
            $table->foreign('rented_by')->references('id')->on('users')->onDelete('CASCADE');
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
        Schema::dropIfExists('rents');
    }
}
