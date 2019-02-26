<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjuntoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'adjunto';

    /**
     * Run the migrations.
     * @table adjunto
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('tipo_adjunto')->unsigned();
            $table->string('name', 150);
            $table->string('url', 256);
            $table->integer('miembro')->unsigned();

            $table->index(["miembro"], 'fk_adjunto_miembro1_idx');

            $table->index(["tipo_adjunto"], 'fk_adjunto_tipo_adjunto_idx');


            $table->foreign('tipo_adjunto', 'fk_adjunto_tipo_adjunto_idx')
                ->references('id')->on('tipo_adjunto')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('miembro', 'fk_adjunto_miembro1_idx')
                ->references('id')->on('miembro')
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
       Schema::dropIfExists($this->tableName);
     }
}
