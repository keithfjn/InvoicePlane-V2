<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OtherTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add the payments table
        Schema::create('payments', function ($table) {
            $table->increments('id');
            $table->integer('payment_method_id')->unsigned(); // FK
            $table->decimal('amount', 20, 9);
            $table->text('description');
        });

        // Add the payment_methods table
        Schema::create('payment_methods', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('payment_gateway_id')->unsigned(); // FK
        });

        // Add the payment_gateways table
        Schema::create('payment_gateways', function ($table) {
            $table->increments('id');
            $table->string('driver', 100);
            $table->boolean('active');
        });

        // Add the quotes table
        Schema::create('quotes', function ($table) {
            $table->increments('id');
            $table->integer('voucher_id')->unsigned(); // FK
            $table->datetime('valid_until');
            $table->integer('tax_rate_id')->unsigned(); // FK
            $table->decimal('discount', 20, 9);
            $table->decimal('cache_item_subtotal', 20, 9);
            $table->decimal('cache_item_taxes', 20, 9);
            $table->decimal('cache_paid', 20, 9);
        });

        // Add the projects table
        Schema::create('projects', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('description');
            $table->datetime('start_at');
            $table->datetime('end_at');
            $table->decimal('budget', 20, 9);
            $table->decimal('cache_budget_spent', 20, 9);
            $table->timestamps();
        });

        // Add the project_user table
        Schema::create('project_user', function ($table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned(); // FK
            $table->integer('users_id')->unsigned(); // FK
            $table->integer('group_id')->unsigned(); // FK
        });

        // Add the settings table
        Schema::create('settings', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->binary('value');
        });

        // Add the tax_rates table
        Schema::create('tax_rates', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->decimal('tax_rate', 3, 3);
        });

        // Add the template_groups table
        Schema::create('template_groups', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('voucher_type_id')->unsigned(); // FK
        });

        // Add the logs table
        Schema::create('logs', function ($table) {
            $table->increments('id');
            $table->string('ip_address', 50);
            $table->integer('user_id')->nullable()->unsigned(); // FK
            $table->text('message');
            $table->timestamps();
        });

        // Add the messages table
        Schema::create('messages', function ($table) {
            $table->increments('id');
            $table->integer('reply_to_id')->nullable()->unsigned(); // FK
            $table->integer('sender_id')->unsigned(); // FK
            $table->integer('recipient_id')->unsigned(); // FK
            $table->text('message');
            $table->integer('project_id')->nullable()->unsigned(); // FK
            $table->integer('voucher_id')->nullable()->unsigned(); // FK
            $table->boolean('read');
            $table->timestamps();
        });

        // Add the attachments table
        Schema::create('attachments', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('filename', 100);
            $table->string('filetype', 10);
            $table->integer('filesize');
            $table->integer('uploader_id')->unsigned(); // FK
            $table->integer('voucher_id')->nullable()->unsigned(); // FK
            $table->integer('message_id')->nullable()->unsigned(); // FK
            $table->integer('project_id')->nullable()->unsigned(); // FK
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
        });

        // Add the backups table
        Schema::create('backups', function ($table) {
            $table->increments('id');
            $table->integer('size');
            $table->timestamps();
        });

        // Add the inventory table
        Schema::create('inventory', function ($table) {
            $table->increments('id');
            $table->string('slug', 50);
            $table->text('description')->nullable();
            $table->integer('tax_rate_id')->nullable()->unsigned(); // FK
            $table->decimal('cost_price', 20, 9);
            $table->decimal('price', 20, 9);
            $table->integer('currency_id')->unsigned(); // FK
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
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
