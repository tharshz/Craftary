<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_charges', function (Blueprint $table) {
            $table->id();
            $table->string('country_code');
            $table->integer('one_to_five');
            $table->integer('five_to_ten');
            $table->integer('ten_to_twenty');
            $table->integer('twenty_to_fifty');
            $table->integer('fifty_to_hundred');
            $table->integer('above_hundred');
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
        Schema::dropIfExists('delivery_charges');
    }
}
