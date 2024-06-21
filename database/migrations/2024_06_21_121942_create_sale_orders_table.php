<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_orders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('total_qty');
            $table->integer('total_amount');
            $table->unsignedBigInteger('customer_id');
            $table->timestamps();
        });

        Schema::table('sale_orders',function(Blueprint $table){
            $table->foreign('customer_id')->on('customers')
                    ->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_orders');
    }
}
