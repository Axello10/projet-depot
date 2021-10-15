<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGivebacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('givebacks', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->integer('deposit_id');
            $table->string('payer');
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
        Schema::dropIfExists('givebacks');
    }
}
