<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomFieldTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Add the custom_fields table
        Schema::create('custom_fields', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('slug', 100);
            $table->string('type', 100);
            $table->timestamps();
        });

        //Add the custom_field_models table
        Schema::create('custom_field_models', function ($table) {
            $table->increments('id');
            $table->integer('custom_field_id')->unsigned(); // FK
            $table->string('model_type', 100);
        });

        //Add the custom_field_values table
        Schema::create('custom_field_values', function ($table) {
            $table->increments('id');
            $table->binary('value');
            $table->integer('custom_field_id')->unsigned(); // FK
            $table->integer('model_id')->unsigned(); // FK
            $table->string('model_type', 100);
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
