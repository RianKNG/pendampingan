<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasitblDil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_dil', function (Blueprint $table) {
            $table->unsignedInteger('id_merek');
            $table->unsignedInteger('id_golongan');
            $table->foreign('id_merek')->references('id')->on('merek')->onDelete('cascade');        
            $table->foreign('id_golongan')->references('id')->on('golongan')->onDelete('cascade'); 
            $table->foreign('id_cabang')->references('id')->on('cabang')->onDelete('cascade'); 
            $table->foreign('id_wilayah')->references('id')->on('wilayah')->onDelete('cascade');
            $table->foreign('id_jalan')->references('id')->on('jalan')->onDelete('cascade');   

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_dil', function (Blueprint $table) {
            //
        });
    }
}
