<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateijazahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ijazah', function (Blueprint $table) {
            $table->bigIncrements('id_ijazah');
            $table->string('no_ijazah');
            $table->string('nim');
            $table->string('ipk');
            $table->string('namaMhs');
            $table->string('jeniskelamin');
            $table->string('prodi');
            $table->string('fakultas');
            $table->string('tahunlulus');
            $table->string('predikat');
            $table->string('ijazah');
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
        Schema::dropIfExists('ijazah');
    }
}
