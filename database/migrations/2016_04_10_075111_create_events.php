<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvents extends Migration
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
            $table->string('title');
            $table->dateTime('date');
            $table->string('descImg');
            $table->text('description');
            $table->text('longDescription');
            $table->string('link');
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
        Schema::drop('events');
    }
}
