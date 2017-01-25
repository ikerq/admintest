<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->timestamps(); //created_at, updated_at
        });

        /*Artisan::call('db:seed', [
            '--class' => 'ProfilesTableSeeder',
            '--force' => true ]
        );*/
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('profiles');
    }
}
