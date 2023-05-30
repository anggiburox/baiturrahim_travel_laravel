<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jamaah', function (Blueprint $table) {
            $table->id('ID_Jamaah');
            $table->bigInteger('NIK')->nullable();
            $table->string('Nama_Jamaah', 50)->nullable();
            $table->string('Tempat_Lahir', 50)->nullable();
            $table->date('Tanggal_Lahir')->nullable();
            $table->enum('Jenis_Kelamin', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->text('Alamat')->nullable();
            $table->string('Nomor_Telepon',25)->nullable();
            $table->string('Pekerjaan', 50)->nullable();
            $table->string('Asal_Kota', 50)->nullable();
            $table->string('Golongan_Darah', 50)->nullable();
            $table->string('Pendidikan', 50)->nullable();
            $table->string('Foto_Jamaah', 100)->nullable();
            $table->string('Bukti_Dokumentasi', 100)->nullable();
            $table->date('Tanggal_Daftar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jamaah');
    }
};