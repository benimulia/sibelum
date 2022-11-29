<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatebarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ijasah', function (Blueprint $table) {
            $table->bigIncrements('id_ijasah');
            $table->string('no_ijasah');
            $table->string('nim');
            $table->string('ipk');
            $table->string('namaMhs');
            $table->string('jeniskelamin');
            $table->string('prodi');
            $table->string('fakultas');
            $table->string('tahunlulus');
            $table->string('predikat');
            $table->string('ijasah');
            $table->string('transkrip');
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
        Schema::dropIfExists('ijasah');
    }
}
