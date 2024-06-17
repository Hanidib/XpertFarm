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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->String("task_name",255);
            $table->Text("description")->nullable();
            $table->Date("due_date")->nullable();
            $table->boolean("status");
            $table->unsignedBigInteger("users_id");

            $table->foreign("users_id")->references("id")->on("users");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
