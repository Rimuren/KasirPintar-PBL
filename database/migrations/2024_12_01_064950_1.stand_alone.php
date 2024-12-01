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
        // Tabel Pelanggan
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->string('namaPelanggan');
            $table->integer('noTlp')->unique();
            $table->string('email')->unique();
            $table->integer('jumlahPoin');
            $table->timestamps();
        });

        // Tabel Supplier
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('namaSupplier');
            $table->integer('noTlp')->unique();
            $table->string('email')->unique();
            $table->timestamps();
        });

        // Tabel Staff
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('namaStaff');
            $table->string('posisi');
            $table->string('email')->unique();
            $table->integer('noTlp')->unique();
            $table->timestamps();
        });

        // Tabel Merk
        Schema::create('merk', function (Blueprint $table) {
            $table->id();
            $table->string('namaMerk');
        });

        // Tabel Kategori
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('namaKategori');
        });

        // Tabel Poin
        Schema::create('poin', function (Blueprint $table) {
            $table->id();
            $table->integer('min_range');
            $table->integer('max_range');
            $table->integer('poin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
        Schema::dropIfExists('supplier');
        Schema::dropIfExists('staff');
        Schema::dropIfExists('merk');
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('poin');
    }
};
