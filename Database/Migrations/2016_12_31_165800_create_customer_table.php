<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('2hs_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();

            $table->string('kdnr')->nullable()->default('');
            $table->string('firstname')->nullable()->default('');
            $table->string('lastname')->nullable()->default('');
            $table->string('bday')->nullable()->default('');

            $table->string('street')->nullable()->default('');
            $table->string('plz')->nullable()->default('');
            $table->string('city')->nullable()->default('');
            $table->string('state')->nullable()->default('');
            $table->string('country')->nullable()->default('');

            $table->string('tel')->nullable()->default('');
            $table->string('email')->nullable()->default('');
            $table->string('mobil')->nullable()->default('');

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
        Schema::dropIfExists('2hs_customers');
    }
}
