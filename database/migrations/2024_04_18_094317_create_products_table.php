<?php

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
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->decimal('discount', 10, 2)->nullable();
            $table->decimal('sell_price', 10, 2);
            $table->integer('quantity_product');
            $table->text('describe_product')->nullable();
            $table->string('screen_type')->nullable();
            $table->string('ram')->nullable();
            $table->string('memory')->nullable();
            $table->string('cpu')->nullable();
            $table->decimal('weight', 10, 2)->nullable();
            $table->string('status')->default('active');
            $table->decimal('price', 10, 2);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
