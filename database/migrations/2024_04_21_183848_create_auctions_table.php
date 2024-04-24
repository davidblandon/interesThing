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
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->date('limitDate');
            $table->integer('basePrice');
            $table->timestamps();
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('productId')->nullable();
            $table->foreign('productId')->references('id')->on('products');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auctions');
    }
};
