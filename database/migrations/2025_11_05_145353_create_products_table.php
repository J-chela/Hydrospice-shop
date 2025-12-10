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

        // Relationship
        $table->foreignId('category_id')->constrained()->onDelete('cascade');

        // Main product fields
        $table->string('name');
        $table->string('slug')->unique();   // <-- Needed for clean URLs
        $table->string('image')->nullable();
        $table->text('description')->nullable();

        // Pricing
        $table->decimal('price', 10, 2);
        $table->decimal('discount_price', 10, 2)->nullable();

        // Optional: Stock
        $table->integer('stock')->default(0);

        // Flash sale support
        $table->boolean('is_flash_sale')->default(false);
        $table->decimal('flash_sale_price', 10, 2)->nullable();
        $table->timestamp('flash_sale_ends_at')->nullable();

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
