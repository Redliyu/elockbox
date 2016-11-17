<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('cases', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('webpage')->nullable();
            $table->string('ssn')->nullable();
            $table->integer('ILP')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('program')->nullable();
            $table->boolean('status')->default(1);//activated = 1, inactivated = 0
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('cases');
    }
}
