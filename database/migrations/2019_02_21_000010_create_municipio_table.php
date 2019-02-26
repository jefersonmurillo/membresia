<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'municipio';

    /**
     * Run the migrations.
     * @table municipio
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('num_municipio', 5);
            $table->integer('departamento_id')->unsigned();
            $table->string('municipio', 45);

            $table->index(["departamento_id"], 'fk_municipio_departamento1_idx');

            $table->unique(["num_municipio", "departamento_id"], 'uniqued_mun_depart');


            $table->foreign('departamento_id', 'fk_municipio_departamento1_idx')
                ->references('id')->on('departamento')
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
