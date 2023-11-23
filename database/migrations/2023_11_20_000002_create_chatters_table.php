<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chatters', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->integer('views');
            $table->timestamps();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chatters');
    }
};
