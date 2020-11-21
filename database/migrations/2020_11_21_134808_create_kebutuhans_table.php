<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKebutuhansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kebutuhans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nominal');
            $table->timestamps();
            $table->unsignedBigInteger('kebutuhan_type_id')->nullable();
            $table->unsignedBigInteger('pengeluaran_id')->nullable();

            $table->foreign('kebutuhan_type_id')->references('id')->on('kebutuhan_types');
            $table->foreign('pengeluaran_id')->references('id')->on('pengeluarans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kebutuhans');
    }
}
