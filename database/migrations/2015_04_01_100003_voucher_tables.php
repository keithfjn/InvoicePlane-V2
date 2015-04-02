<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VoucherTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add the vouchers table
        Schema::create('vouchers', function ($table) {
            $table->increments('id');
            $table->string('voucher_key', 100);
            $table->integer('type');
            $table->integer('creator_id')->unsigned(); // FK
            $table->integer('client_id')->unsigned(); // FK
            $table->integer('project_id')->nullable()->unsigned(); // FK
            $table->integer('voucher_group_id')->unsigned(); // FK
            $table->integer('voucher_status_id')->unsigned(); // FK
            $table->integer('currency_exchange_rate_id')->unsigned(); // FK
            $table->string('url_key', 30);
            $table->boolean('in_trash');
            $table->timestamps();
        });

        // Add the voucher_groups table
        Schema::create('voucher_groups', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('key_format', 100);
            $table->integer('next_id');
            $table->string('next_id_reset_cycle', 30)->nullable();
            $table->integer('template_group_id')->unsigned(); // FK
            $table->integer('voucher_type_id')->unsigned(); // FK
        });

        // Add the voucher_items table
        Schema::create('voucher_items', function ($table) {
            $table->increments('id');
            $table->string('slug', 100);
            $table->text('description');
            $table->integer('ordering');
            $table->decimal('quantity', 20, 9);
            $table->decimal('cost_price', 20, 9);
            $table->decimal('price', 20, 9);
            $table->integer('tax_rate_id')->unsigned(); // FK
            $table->decimal('discount', 20, 9);
            $table->integer('voucher_id')->unsigned(); // FK
            $table->integer('original_item_id')->unsigned(); // FK
            $table->timestamps();
        });

        // Add the voucher_notes table
        Schema::create('voucher_notes', function ($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); // FK
            $table->integer('voucher_id')->unsigned(); // FK
            $table->text('note');
            $table->timestamps();
        });

        // Add the voucher_statuses table
        Schema::create('voucher_statuses', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->boolean('protected');
            $table->integer('voucher_type_id')->unsigned(); // FK
        });

        // Add the voucher_status_templates table
        Schema::create('voucher_status_templates', function ($table) {
            $table->increments('id');
            $table->integer('template_group_id')->unsigned(); // FK
            $table->integer('voucher_status_id')->unsigned(); // FK
            $table->string('name', 100);
            $table->text('email');
            $table->integer('pdf');
        });

        // Add the voucher_types table
        Schema::create('voucher_types', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
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
