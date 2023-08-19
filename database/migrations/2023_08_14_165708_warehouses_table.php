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
        Schema::create('warehouses_table', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sources_id')->nullable()->default(1);
            $table->unsignedBigInteger('types_id')->nullable()->default(1);
            $table->unsignedBigInteger('manufactures_id')->nullable()->default(1);
            $table->unsignedBigInteger('locations_id')->nullable()->default(1);
            $table->string('volume')->nullable();
            $table->string('total_volume')->nullable();
            $table->string('photo')->nullable();
            $table->enum('remark', ['in','out','processing'])
                ->nullable()->default('in');
            $table->timestamps();
        });
        Schema::table('warehouses_table', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses_table');
    }
};