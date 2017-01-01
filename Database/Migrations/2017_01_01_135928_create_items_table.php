<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('2hs_items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('customer_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();

            $table->string('item_nr')->nullable()->default('');
            $table->string('name')->nullable()->default('');
            $table->text('description')->nullable()->default('');
            $table->text('content')->nullable()->default('');
            $table->string('image')->nullable()->default(null);
            $table->decimal('price', 16, 2)->default(0.00);

            $table->integer('limit')->unsigned()->default(0);
            $table->timestamp('sold_at')->nullable()->default(null);
            $table->timestamp('expires_at')->nullable()->default(null);
            $table->integer('resell')->default(0);

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
        Schema::dropIfExists('2hs_items');
    }
}
