<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('route');
            $table->tinyInteger('has_child');
            $table->tinyInteger('parent')->default(0)->nullable();
            $table->tinyInteger('active');
            $table->tinyInteger('order');
            $table->string('icon')->nullable();
            $table->timestamps(); //created_at, updated_at
        });

        /*Artisan::call('db:seed',[
                '--class' => 'ModulesTableSeeder',
                '--force' => true
            ]
        );*/
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('modules');
    }
}
