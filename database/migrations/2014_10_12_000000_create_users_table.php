<?php

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
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->integer('sex');
            $table->string('email')->unique();
            $table->string('cellphone');
            $table->string('localphone');
            $table->string('password');
            $table->integer('id_profile')->default(2);
            $table->integer('active')->default(0);
            $table->integer('password_reset')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
        
        Artisan::call('db:seed',[
            '--class' => 'UsersTableSeeder',
            '--force' => true
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}