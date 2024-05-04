<?php
/**
 * Created by: Juan Martín Espitia Gonzalez
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('price');
            $table->string('photo');
            $table->string('category');
            $table->boolean('auctioned')->default(false);
            $table->unsignedBigInteger('buyerId')->nullable();
            $table->foreign('buyerId')->references('id')->on('users');
            $table->unsignedBigInteger('sellerId')->nullable();
            $table->foreign('sellerId')->references('id')->on('users');
            $table->unsignedBigInteger('orderId')->nullable();
            $table->foreign('orderId')->references('id')->on('orders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
