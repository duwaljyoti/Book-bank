<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableBooksAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->boolean('is_for_sale')->after('description')->default(0);
            $table->boolean('is_acquired')->after('description')->default(0);
            $table->integer('price');
            $table->integer('discounted_price');
            $table->dropColumn('is_request');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('is_for_sale');
            $table->dropColumn('is_acquired');
            $table->dropColumn('price');
            $table->dropColumn('discounted_price');
            $table->boolean('is_request')->default(0);
        });
    }
}
