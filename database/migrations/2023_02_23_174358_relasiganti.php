<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

class Relasiganti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ganti', function (Blueprint $table) {
            $table->unsignedInteger('id_dil');
            $table->unsignedInteger('id_merek');
            $table->foreign('id_merek')->references('id')->on('merek')->onDelete('Cascade');   
            $table->foreign('id_dil')->references('id')->on('tbl_dil')->onDelete('Cascade');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ganti', function (Blueprint $table) {
            //
        });
    }
}
