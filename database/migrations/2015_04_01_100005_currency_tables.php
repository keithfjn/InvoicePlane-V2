<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CurrencyTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add the currencies table
        Schema::create('currencies', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('sign', 10);
            $table->boolean('place_before');
            $table->integer('decimal_places');
            $table->timestamps();
        });

        // Add the currency_exchange_rates table
        Schema::create('currency_exchange_rates', function ($table) {
            $table->increments('id');
            $table->integer('currency_id')->unsigned(); // FK
            $table->decimal('exchange_rate', 12, 11);
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
    }

}
