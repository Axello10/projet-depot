<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRareCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rare_cases', function (Blueprint $table) {
            $table->id();
            $table->string('incident');
            $table->text('justification')->nullable();
            $table->string('acteur')->nullable();
            $table->integer('user_id');
            $table->integer('deposit_id');
            $table->integer('price')->nullable();
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
        Schema::dropIfExists('rare_cases');
    }
}
