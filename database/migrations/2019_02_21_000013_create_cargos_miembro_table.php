<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargosMiembroTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'cargos_miembro';

    /**
     * Run the migrations.
     * @table cargos_miembro
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('miembro')->unsigned();
            $table->integer('cargo')->unsigned();

            $table->index(["cargo"], 'fk_miembro_has_cargos_cargos1_idx');

            $table->index(["miembro"], 'fk_miembro_has_cargos_miembro1_idx');


            $table->foreign('miembro', 'fk_miembro_has_cargos_miembro1_idx')
                ->references('id')->on('miembro')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('cargo', 'fk_miembro_has_cargos_cargos1_idx')
                ->references('id')->on('cargos')
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
