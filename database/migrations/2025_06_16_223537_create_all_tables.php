<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

   // Tabel menu
        Schema::create('menu', function (Blueprint $table) {
            $table->id('idmenu');
            $table->char('Namamenu', 20);
            $table->integer('Harga');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });

        // Tabel user
        Schema::create('user', function (Blueprint $table) {
            $table->id('iduser');
            $table->string('Namauser', 50);
            $table->timestamps();
        });

        // Tabel pelanggan
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id('idpelanggan');
            $table->string('Namapelanggan', 20);
            $table->enum('Jeniskelamin', ['Laki-laki', 'Perempuan']);
            $table->string('Nohp', 13);
            $table->string('Alamat', 95);
            $table->timestamps();
        });

        // Tabel pesanan
        Schema::create('pesanan', function (Blueprint $table) {
           $table->id('idpesanan');
           
           $table->unsignedBigInteger('idmenu');
           $table->unsignedBigInteger('idpelanggan');
           $table->unsignedBigInteger('iduser');
           
           $table->integer('jumlah');
           $table->timestamps();
           $table->foreign('idmenu')->references('idmenu')->on('menu')->onDelete('cascade');
           
           $table->foreign('idpelanggan')->references('idpelanggan')->on('pelanggan')->onDelete('cascade');
           $table->foreign('iduser')->references('iduser')->on('user')->onDelete('cascade');
        });

        // Tabel transaksi
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idpesanan');
            $table->integer('total');
            $table->integer('bayar');
            $table->timestamps();
            
            $table->foreign('idpesanan')->references('idpesanan')->on('pesanan')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
        Schema::dropIfExists('pesanan');
        Schema::dropIfExists('pelanggan');
        Schema::dropIfExists('user');
        Schema::dropIfExists('menu');
    }
};