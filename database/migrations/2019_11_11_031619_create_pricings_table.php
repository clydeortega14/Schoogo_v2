<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedMediumInteger('size');
            $table->unsignedSmallInteger('quantity');
            $table->float('price', 8, 2);
            // $table->timestamps();

            $table->foreign('size')->references('id')->on('paper_sizes')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('quantity')->references('id')->on('quantities')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pricings');
    }
}
