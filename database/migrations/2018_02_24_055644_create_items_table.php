<?php

use Illuminate\Support\Facades\Schema;
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
      Schema::create('items', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->integer('categori_id')->unsigned();
          $table->integer('suplier_id')->unsigned();
          $table->integer('buy_price');
          $table->integer('sell_price');
          $table->integer('stock');

          $table->foreign('categori_id')->references('id')->on('categories');
          $table->foreign('suplier_id')->references('id')->on('supliers');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
