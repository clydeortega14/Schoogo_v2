<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDocStatusId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_files', function (Blueprint $table) {
            $table->unsignedSmallInteger('docs_status_id')->after('total_price');

            //foreign key
            $table->foreign('docs_status_id')->references('id')->on('docs_statuses')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('request_files', function (Blueprint $table) {
            $table->dropColumn('docs_status_id');
        });
    }
}
