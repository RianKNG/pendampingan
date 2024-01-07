<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblDilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dil', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status')->nullable();
            $table->unsignedInteger('id_cabang');
            $table->string('no_rekening')->nullable();
            $table->string('nama_sekarang')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('alamat')->nullable();
            $table->string('angka')->nullable();
            $table->string('status_milik')->nullable();
            $table->integer('jml_jiwa_tetap')->nullable();
            $table->integer('jml_jiwa_tidak_tetap')->nullable();
            $table->string('kondisi_wm')->nullable();
            $table->string('segel')->nullable();
            $table->string('stop_kran')->nullable();
            $table->string('ceck_valve')->nullable();
            $table->string('kopling')->nullable();
            $table->string('plugran')->nullable();
            $table->string('box')->nullable();
            $table->string('usaha')->nullable();
            $table->string('sumber_lain')->nullable();
            $table->string('no_seri')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->date('tanggal_pasang')->nullable();
            $table->date('tanggal_file')->nullable();

            $table->foreign('id_cabang')->references('id')->on('cabang')->onDelete('cascade'); 
           
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_dil');
    }
}
