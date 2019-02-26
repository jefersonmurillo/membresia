<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongregacionMiembroTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'congregacion_miembro';

    /**
     * Run the migrations.
     * @table congregacion_miembro
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('congregacion')->unsigned();
            $table->integer('miembro')->unsigned();
            $table->date('fecha_ingreso');
            $table->date('fecha_salida')->nullable();

            $table->index(["congregacion"], 'fk_congregacion_has_miembro_congregacion1_idx');

            $table->index(["miembro"], 'fk_congregacion_has_miembro_miembro1_idx');


            $table->foreign('congregacion', 'fk_congregacion_has_miembro_congregacion1_idx')
                ->references('id')->on('congregacion')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('miembro', 'fk_congregacion_has_miembro_miembro1_idx')
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
