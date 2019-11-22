<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function(Blueprint $table) {
             $table->text('description')->nullable();
             $table->boolean('is_request')->default(0);
             $table->boolean('is_for_rent')->default(0);
             $table->string('image', 100)->nullable();
             $table->unsignedInteger('category_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function(Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('is_request');
            $table->dropColumn('is_for_rent');
            $table->dropColumn('image');
            $table->dropColumn('category_id');
        });
    }
}
