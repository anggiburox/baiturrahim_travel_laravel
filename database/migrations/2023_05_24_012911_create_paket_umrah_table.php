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
        Schema::create('paket_umrah', function (Blueprint $table) {
            $table->string('ID_Paket_Umrah', 20)->primary();
            $table->string('Nama_Paket_Umrah', 50);
            $table->bigInteger('Harga_Paket_Umrah');
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
        Schema::dropIfExists('paket_umrah');
    }
};