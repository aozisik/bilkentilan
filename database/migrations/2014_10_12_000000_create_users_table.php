<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password', 60);

            $table->string('fisrt_name');
            $table->string('last_name');
            $table->string('location');
            $table->string('phone');

            $table->boolean('show_phone');
            $table->boolean('show_email');
            $table->boolean('newsletter');

            $table->boolean('is_active')->default(false);
            $table->string('activation_key', 32);

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
