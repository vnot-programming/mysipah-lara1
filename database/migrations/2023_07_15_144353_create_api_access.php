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
        Schema::create('api_access', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('api_tokens_id')->nullable()->default(1);
            $table->string('pic')->nullable();
            $table->string('institusi')->nullable();
            $table->string('alasan')->nullable();
            $table->timestamps();
        });
        Schema::table('api_access', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_access');
    }
};