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

        Schema::create('docs', function (Blueprint $table)
        {
            $table->increments('id');
            $table->bigInteger('case_id')->unsigned();
            $table->string('type', 50)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('path', 255);
            $table->text('description')->nullable();
            $table->string('filename');
            $table->string('uploader', 255);
            $table->timestamps();
        });

        Schema::create('additional_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('case_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });

        Schema::create('edu_history', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('case_id')->unsigned();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('school')->nullable();
            $table->string('level')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });

        Schema::create('work_history', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('case_id')->unsigned();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('company')->nullable();
            $table->string('industry')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->nullable();
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
        //
        Schema::drop('cases');
    }
}
