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
        Schema::create('purchase_order', function (Blueprint $table) {
            $table->id();
            $table->string('order_date');
            $table->unsignedBigInteger('stock_id');
            $table->foreign('stock_id')->references('id')->on('stock');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('supplier');
            $table->string('quantity_ordered');
            $table->string('total_cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order');
    }
};
