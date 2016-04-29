<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelease extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('brewery');
            $table->string('style');
            $table->text('description');
            $table->dateTime('releaseDate');
            $table->float('bitterness');
            $table->boolean('bitternessAprox');
            $table->float('color');
            $table->boolean('colorAprox');
            $table->float('abv');
            $table->boolean('abvAprox');
            $table->dateTime('link');
            $table->integer('uploaderID')->unsigned();
            $table->boolean('authCheck')->default(0);
            $table->boolean('highlight')->default(0);
            $table->timestamps();
            
            //Establish uploaderID as FK on users table. Delete posts from deleted users
            $table->foreign('uploaderID')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('releases');
    }
}
