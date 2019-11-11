<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('or_number')->nullable();
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('product_id');
            $table->unsignedMediumInteger('paper_size_id');
            $table->unsignedMediumInteger('paper_id');
            $table->unsignedSmallInteger('finishing_touches_id')->nullable();
            $table->unsignedSmallInteger('front')->nullable();
            $table->unsignedSmallInteger('back')->nullable();
            $table->integer('qty');
            $table->float('price', 8, 2);
            $table->unsignedSmallInteger('order_status_id');
            $table->timestamps();


            //foreign keys
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('product_id')->references('id')->on('products')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('paper_size_id')->references('id')->on('paper_sizes')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('paper_id')->references('id')->on('papers')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('finishing_touches_id')->references('id')->on('finishing_touches')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('front')->references('id')->on('print_options')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('back')->references('id')->on('print_options')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('order_status_id')->references('id')->on('orders_status')
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
        Schema::dropIfExists('orders');
    }
}
