<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('2hs_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();

            $table->string('type')->nullable()->default('commission');
            $table->string('nr')->nullable()->default('');
            $table->decimal('price', 10, 2)->nullable()->default(0.00);
            $table->boolean('status')->nullable()->default(false);

            $table->timestamp('date')->nullable()->default(null);
            $table->timestamp('pay_date')->nullable()->default(null);
            $table->timestamp('paid_at')->nullable()->default(null);
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
        Schema::dropIfExists('2hs_bills');
    }
}
