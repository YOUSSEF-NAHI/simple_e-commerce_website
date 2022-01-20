<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_product', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->integer('totalPrice');
            $table->timestamps();

            $table->foreignId('cart_id')
                    ->constrained('carts')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
    
            $table->foreignId('product_id')
                    ->constrained('products')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commands');
    }
}
