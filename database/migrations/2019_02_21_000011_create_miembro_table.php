<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiembroTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'miembro';

    /**
     * Run the migrations.
     * @table miembro
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('tipo_miembro')->unsigned();
            $table->integer('estado_civil')->unsigned();
            $table->string('nombres', 150);
            $table->string('apellidos', 150);
            $table->integer('tipo_documento')->unsigned();
            $table->string('documento', 11);
            $table->date('fecha_naci');
            $table->integer('mun_naci')->unsigned();
            $table->string('ocupacion_actual', 150);
            $table->string('direccion_corresp', 150);
            $table->string('telefono', 10)->nullable();
            $table->string('celular', 10)->nullable();
            $table->string('correo', 60)->nullable();
            $table->date('fecha_bautizo');
            $table->integer('mun_bautizo')->unsigned();
            $table->string('pastor_bautizo', 150);
            $table->date('fecha_espiritu')->nullable();
            $table->string('observaciones')->nullable();
            $table->integer('escolaridad')->unsigned();
            $table->string('profesion', 150)->nullable();
            $table->string('conyuge', 100)->nullable();

            $table->index(["mun_bautizo"], 'fk_miembro_municipio2_idx');

            $table->index(["tipo_miembro"], 'fk_miembro_tipo_miembro1_idx');

            $table->index(["escolaridad"], 'fk_miembro_tipo_estudio1_idx');

            $table->index(["mun_naci"], 'fk_miembro_municipio1_idx');

            $table->index(["estado_civil"], 'fk_miembro_estado_civil1_idx');

            $table->index(["tipo_documento"], 'fk_miembro_tipo_documento1_idx');

            $table->unique(["correo"], 'correo_UNIQUE');

            $table->unique(["documento"], 'documento_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('tipo_documento', 'fk_miembro_tipo_documento1_idx')
                ->references('id')->on('tipo_documento')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('mun_naci', 'fk_miembro_municipio1_idx')
                ->references('id')->on('municipio')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('tipo_miembro', 'fk_miembro_tipo_miembro1_idx')
                ->references('id')->on('tipo_miembro')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('mun_bautizo', 'fk_miembro_municipio2_idx')
                ->references('id')->on('municipio')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('escolaridad', 'fk_miembro_tipo_estudio1_idx')
                ->references('id')->on('tipo_estudio')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('estado_civil', 'fk_miembro_estado_civil1_idx')
                ->references('id')->on('estado_civil')
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
