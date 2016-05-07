<?php
/*
 * 
 * This migration creates the events table, and the eventsImg table (Images
 * associated with the events). Rolling back drops both tables.
 * 
 */

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
        /*
         * Create events table
         */
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->dateTime('date');
            $table->integer('img');
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
        
        /*
         * Create Image database 
        */ 
        Schema::create('events_imgs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        
        //Add Image column to eventsImg table
        DB::statement("ALTER TABLE eventsImg ADD img MEDIUMBLOB");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
        Schema::drop('eventsImg');
    }
}
