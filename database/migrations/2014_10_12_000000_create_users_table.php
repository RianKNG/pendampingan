<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('level');
            $table->timestamps();
        });
        // DB::table('tb_user')->insert([
        //     'name' => 'Administrator',
        //     'email' => 'admin@gmail.com',
        //     'password' => 'admin',
        //     'level' => 'admin',
        // ]);

        // DB::table('tb_user')->insert([
        //     'name' => 'User',
        //     'email' => 'user@gmail.com',
        //     'password' => 'user',
        //     'level' => 'user',
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
