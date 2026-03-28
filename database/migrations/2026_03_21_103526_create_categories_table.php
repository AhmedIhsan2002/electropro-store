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
        Schema::create('categories', function (Blueprint $table) {
          $table->id();
          $table->string('name_ar');          // الاسم بالعربي
          $table->string('name_en');          // الاسم بالإنجليزي
          $table->string('slug')->unique();   // الرابط المختصر
          $table->text('description')->nullable();
          $table->string('image')->nullable(); // صورة القسم
          $table->unsignedBigInteger('parent_id')->nullable(); // للأقسام الفرعية
          $table->boolean('is_active')->default(true);
          $table->timestamps();

          $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
