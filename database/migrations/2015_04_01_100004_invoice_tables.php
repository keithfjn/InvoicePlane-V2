<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InvoiceTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add the invoices table
        Schema::create('invoices', function ($table) {
            $table->increments('id');
            $table->datetime('due_at');
            $table->integer('voucher_id')->unsigned(); // FK
            $table->integer('quote_id')->nullable()->unsigned(); // FK
            $table->integer('tax_rate_id')->unsigned(); // FK
            $table->decimal('discount', 20, 9);
            $table->decimal('cache_item_subtotal', 20, 9);
            $table->decimal('cache_item_taxes', 20, 9);
            $table->decimal('cache_paid', 20, 9);
        });

        // Add the invoice_payment table
        Schema::create('invoice_payment', function ($table) {
            $table->increments('id');
            $table->integer('payment_id')->unsigned(); // FK
            $table->integer('invoice_id')->unsigned(); // FK
            $table->decimal('amount', 20, 9);
        });

        // Add the invoice_recurring table
        Schema::create('invoice_recurring', function ($table) {
            $table->increments('id');
            $table->integer('invoice_id')->unsigned(); // FK
            $table->datetime('start_at');
            $table->datetime('end_at');
            $table->datetime('next_at');
            $table->char('frequency', 4);
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
