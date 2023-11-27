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
        Schema::create('tbl_barang', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('nama_barang');
            $table->string('nama_pengirim');
            $table->string('nama_penerima');
            $table->string('alamat_penerima');
            $table->string('status_barang');
            $table->string('tlp_pengirim');
            $table->string('tlp_penerima');
            $table->string('cara_packing');
            $table->integer('jumlah_barang');
            $table->integer('ukuran_barang');
            $table->string('jenis_ukuran');
            $table->string('waktu_terima');
            $table->string('waktu_kirim');
            $table->string('waktu_sampai');
            $table->string('waktu_diterima');
            $table->integer('biaya_ongkir');
            $table->string('no_resi');
            $table->string('metode_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_barang');
    }
};
