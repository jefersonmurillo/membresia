<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCongragacionUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public $tableName = 'users';

    public function up()
    {
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->integer('congregacion')->unsigned();

            $table->foreign('congregacion', 'fk_usuario_congragacion')
                ->references('id')->on('congregacion')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('congregacion');
        });
    }
}
