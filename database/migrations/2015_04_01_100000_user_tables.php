<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Update the 'users' table
        Schema::table('users', function ($table) {
            $table->boolean('active')->after('id');
            $table->integer('client_id')->after('active')->unsigned(); // FK
            $table->boolean('login_enabled')->after('activated_at');
            $table->string('remember_token', 100)->nullable()->after('last_login');
            $table->string('phone', 30)->nullable()->after('last_name');
            $table->string('mobile', 30)->nullable()->after('phone');
            $table->string('fax', 30)->nullable()->after('mobile');
            $table->integer('default_address_id')->nullable()->after('fax')->unsigned(); // FK
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
