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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_id')->nullable()->default(1);
            // $table->unsignedBigInteger('processings_id')->nullable()->default(1);
            $table->unsignedBigInteger('types_id')->nullable()->default(1);
            $table->unsignedBigInteger('locations_id')->nullable()->default(1);
            $table->string('photo')->nullable();
            $table->double('volume')->nullable();
            $table->double('ukuran')->nullable();
            $table->double('jumlah_produk')->nullable();
            $table->timestamps();
        });
        Schema::table('inventories', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
