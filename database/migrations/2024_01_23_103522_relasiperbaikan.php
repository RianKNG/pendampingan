<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relasiperbaikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perbaikan', function (Blueprint $table) {
            $table->unsignedInteger('id_dil');
            $table ->foreign('id_dil')->references('id')->on('tbl_dil')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perbaikan', function (Blueprint $table) {
            //
        });
    }
}
