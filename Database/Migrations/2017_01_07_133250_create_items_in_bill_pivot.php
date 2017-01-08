<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsInBillPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('2hs_bill_items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('position')->nullable()->default(0);
            $table->integer('item_id')->unsigned()->index();
            $table->integer('bill_id')->unsigned()->index();
            
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
        Schema::dropIfExists('2hs_bill_items');
    }
}
