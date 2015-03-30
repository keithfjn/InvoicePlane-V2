<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // Add the clients table
        Schema::create('clients', function($table)
        {
            $table->increments('id');
            $table->boolean('active');
            $table->string('name', 100);
            $table->string('phone', 30)->nullable();
            $table->string('fax', 30)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('vat_id', 100)->nullable();
            $table->string('tax_code', 100)->nullable();
            $table->timestamps();
        });

        // Add the client_addresses table
        Schema::create('client_addresses', function($table)
        {
            $table->increments('id');
            $table->integer('client_id');
            $table->text('address');
            $table->string('country', 50)->nullable();
            $table->timestamps();
        });

        // Add the client_notes table
        Schema::create('client_notes', function($table)
        {
            $table->increments('id');
            $table->integer('client_id');
            $table->text('note');
            $table->integer('user_id');
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
