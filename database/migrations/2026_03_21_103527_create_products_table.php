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
           $table->string('name_ar');
           $table->string('name_en');
           $table->string('slug')->unique();
           $table->text('description_ar');
           $table->text('description_en');
           $table->text('specifications')->nullable(); // مواصفات (JSON)
           $table->decimal('price', 10, 2);
           $table->decimal('compare_price', 10, 2)->nullable(); // السعر قبل الخصم
           $table->integer('stock_quantity')->default(0);
           $table->string('sku')->unique(); // رمز المنتج
           $table->unsignedBigInteger('category_id');
           $table->unsignedBigInteger('brand_id')->nullable();
           $table->boolean('is_featured')->default(false); // منتج مميز
           $table->boolean('is_active')->default(true);
           $table->timestamps();

           $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
           $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
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
