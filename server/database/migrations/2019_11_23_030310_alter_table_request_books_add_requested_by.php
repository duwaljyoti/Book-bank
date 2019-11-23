<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableRequestBooksAddRequestedBy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_books', function (Blueprint $table) {
            $table->unsignedInteger('requested_by')->after('id')->nullable();
            $table->foreign('requested_by')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('request_books', function (Blueprint $table) {
            $table->dropForeign('requested_by');
            $table->dropColumn('requested_by');
        });
    }
}
