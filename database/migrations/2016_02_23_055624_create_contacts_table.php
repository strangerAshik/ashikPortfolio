<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('email');
            $table->text('mailling_address');
            $table->float('gps_latitude');
            $table->float('gps_longitude');
            $table->string('phone');
            $table->string('moblie');
            $table->string('fax');
                      
            $table->string('creator');
            $table->string('updater');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contacts');
    }
}
