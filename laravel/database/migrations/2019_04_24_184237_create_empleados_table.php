<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->integer('id',true);
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('company_id')->index('fk_empleados_empresas1_idx');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();

            $table->foreign('company_id', 'fk_empleados_empresas1')->references('id')->on('empresas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
