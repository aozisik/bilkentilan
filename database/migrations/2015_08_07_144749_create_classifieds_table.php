<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassifiedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classifieds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned();
            $table->integer('category_id')->index()->unsigned();
            $table->string('title');
            $table->text('description');
            $table->double('price', 9, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->boolean('approved')->default(true);
            $table->integer('visits')->unsigned();
            $table->timestamp('expires_at');
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
        Schema::drop('classifieds');
    }
}
