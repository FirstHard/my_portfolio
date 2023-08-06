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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('image_path', 255);
            $table->integer('creation_year');
            $table->text('description');
            $table->string('domain', 64)->nullable();
            $table->text('gallery')->nullable();
            $table->integer('cost_from')->nullable();
            $table->integer('cost_to')->nullable();
            $table->tinyInteger('archived')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
