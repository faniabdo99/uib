<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('sub_services', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('image_description');
            $table->string('description');
            $table->integer('user_id');
            $table->integer('service_id');
            $table->string('lang')->default('en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('sub_services');
    }
};
