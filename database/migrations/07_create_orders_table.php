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
    Schema::create('orders', function (Blueprint $table) {
      $table->string('id', 8)->primary();
      $table->string('code', 10)->unique();
      $table->string('name');
      $table->string('phone');
      $table->string('address');
      $table->decimal('total', 18, 2);
      $table->string('user_id', 8);
      $table->unsignedBigInteger('order_status_id');
      $table->timestamps();

      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('order_status_id')->references('id')->on('order_statuses');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('orders');
  }
};