<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmptiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empties', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
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
        Schema::dropIfExists('empties');
    }
}
