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
        Schema::create('keberangkatan', function (Blueprint $table) {
            $table->string('ID_Keberangkatan', 20)->primary();
            $table->string('ID_Jamaah', 50);
            $table->string('ID_Paket_Umrah', 50);
            $table->date('Tanggal_Keberangkatan');
            $table->text('Titik_Kumpul');
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
        Schema::dropIfExists('keberangkatan');
    }
};