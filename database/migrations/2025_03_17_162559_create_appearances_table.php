<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appearances', function (Blueprint $table) {
            $table->id();
            $table->string('type')->unique();
            $table->json('value'); // Không đặt giá trị mặc định ở đây
            $table->string('default')->nullable(); // Không đặt giá trị mặc định ở đây
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appearances');
    }
};