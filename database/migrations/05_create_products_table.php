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
      $table->string('title');
      $table->string('slug');
      $table->text('description');
      $table->string('cover');
      $table->decimal('price', 18, 2);
      $table->decimal('original_price', 18, 2);
      $table->decimal('sale_price', 18, 2);
      $table->integer('quantity');
      $table->integer('view_count');
      $table->boolean('is_home')->default(false);
      $table->boolean('is_sale')->default(false);
      $table->boolean('is_hot')->default(false);
      $table->boolean('is_stop')->default(false);
      $table->timestamps();
      $table->unsignedBigInteger('category_id');
      $table->unsignedBigInteger('order_status_id');

      $table->foreign('category_id')->references('id')->on('categories');
      $table->foreign('order_status_id')->references('id')->on('order_statuses');
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
