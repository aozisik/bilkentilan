<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImportedToClassifiedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classifieds', function(Blueprint $table) {
            $table->boolean('is_imported')->default(false)->after('expires_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classifieds', function(Blueprint $table) {
            $table->dropColumn('is_imported');
        });
    }
}
