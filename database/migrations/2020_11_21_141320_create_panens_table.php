<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nominal')->comment="gram";
            $table->text('description');
            $table->timestamps();
            $table->unsignedBigInteger('pemasukan_id')->nullable();

            $table->foreign('pemasukan_id')->references('id')->on('pemasukans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('panens');
    }
}
