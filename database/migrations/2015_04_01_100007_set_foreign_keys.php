<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetForeignKeys extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Foreign keys for 'users' table
        Schema::table('users', function ($table) {
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('default_address_id')->references('id')->on('client_addresses');
        });

        // Foreign keys for 'client_addresses' table
        Schema::table('client_addresses', function ($table) {
            $table->foreign('client_id')->references('id')->on('clients');
        });

        // Foreign keys for 'client_notes' table
        Schema::table('client_notes', function ($table) {
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('user_id')->references('id')->on('users');
        });

        // Foreign keys for 'custom_field_models' table
        Schema::table('custom_field_models', function ($table) {
            $table->foreign('custom_field_id')->references('id')->on('custom_fields');
        });

        // Foreign keys for 'custom_field_values' table
        Schema::table('custom_field_values', function ($table) {
            $table->foreign('model_id')->references('id')->on('custom_field_models');
        });

        // Foreign keys for 'vouchers' table
        Schema::table('vouchers', function ($table) {
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('voucher_group_id')->references('id')->on('voucher_groups');
            $table->foreign('voucher_status_id')->references('id')->on('voucher_statuses');
            $table->foreign('currency_exchange_rate_id')->references('id')->on('currency_exchange_rates');
        });

        // Foreign keys for 'voucher_groups' table
        Schema::table('voucher_groups', function ($table) {
            $table->foreign('template_group_id')->references('id')->on('template_groups');
            $table->foreign('voucher_type_id')->references('id')->on('voucher_types');
        });

        // Foreign keys for 'voucher_items' table
        Schema::table('voucher_items', function ($table) {
            $table->foreign('tax_rate_id')->references('id')->on('tax_rates');
            $table->foreign('voucher_id')->references('id')->on('vouchers');
            $table->foreign('original_item_id')->references('id')->on('inventory');
        });

        // Foreign keys for 'voucher_notes' table
        Schema::table('voucher_notes', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('voucher_id')->references('id')->on('vouchers');
        });

        // Foreign keys for 'voucher_statuses' table
        Schema::table('voucher_statuses', function ($table) {
            $table->foreign('voucher_type_id')->references('id')->on('voucher_types');
        });

        // Foreign keys for 'voucher_status_templates' table
        Schema::table('voucher_status_templates', function ($table) {
            $table->foreign('template_group_id')->references('id')->on('template_groups');
            $table->foreign('voucher_status_id')->references('id')->on('voucher_statuses');
        });

        // Foreign keys for 'invoices' table
        Schema::table('invoices', function ($table) {
            $table->foreign('voucher_id')->references('id')->on('vouchers');
            $table->foreign('quote_id')->references('id')->on('quotes');
            $table->foreign('tax_rate_id')->references('id')->on('tax_rates');
        });

        // Foreign keys for 'invoice_payment' table
        Schema::table('invoice_payment', function ($table) {
            $table->foreign('payment_id')->references('id')->on('payments');
            $table->foreign('invoice_id')->references('id')->on('invoices');
        });

        // Foreign keys for 'invoice_recurring' table
        Schema::table('invoice_recurring', function ($table) {
            $table->foreign('invoice_id')->references('id')->on('invoices');
        });

        // Foreign keys for 'currency_exchange_rates' table
        Schema::table('currency_exchange_rates', function ($table) {
            $table->foreign('currency_id')->references('id')->on('currencies');
        });

        // Foreign keys for 'payments' table
        Schema::table('payments', function ($table) {
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
        });

        // Foreign keys for 'payment_methods' table
        Schema::table('payment_methods', function ($table) {
            $table->foreign('payment_gateway_id')->references('id')->on('payment_gateways');
        });

        // Foreign keys for 'quotes' table
        Schema::table('quotes', function ($table) {
            $table->foreign('voucher_id')->references('id')->on('vouchers');
            $table->foreign('tax_rate_id')->references('id')->on('tax_rates');
        });

        // Foreign keys for 'project_user' table
        Schema::table('project_user', function ($table) {
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('group_id')->references('id')->on('groups');
        });

        // Foreign keys for 'template_groups' table
        Schema::table('template_groups', function ($table) {
            $table->foreign('voucher_type_id')->references('id')->on('voucher_types');
        });

        // Foreign keys for 'logs' table
        Schema::table('logs', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        // Foreign keys for 'messages' table
        Schema::table('messages', function ($table) {
            $table->foreign('reply_to_id')->references('id')->on('messages');
            $table->foreign('sender_id')->references('id')->on('users');
            $table->foreign('recipient_id')->references('id')->on('users');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('voucher_id')->references('id')->on('vouchers');
        });

        // Foreign keys for 'attachments' table
        Schema::table('attachments', function ($table) {
            $table->foreign('uploader_id')->references('id')->on('users');
            $table->foreign('voucher_id')->references('id')->on('vouchers');
            $table->foreign('message_id')->references('id')->on('messages');
            $table->foreign('project_id')->references('id')->on('projects');
        });

        // Foreign keys for 'inventory' table
        Schema::table('inventory', function ($table) {
            $table->foreign('tax_rate_id')->references('id')->on('tax_rates');
            $table->foreign('currency_id')->references('id')->on('currencies');
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
