<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKumbungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kumbungs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('photo')->nullable();
            $table->decimal('large', 6,2);
            $table->enum('status', ['0', '1']);
            $table->timestamps();
            $table->unsignedBigInteger('jamur_id');
            $table->unsignedBigInteger('budidaya_id');

            $table->foreign('jamur_id')->references('id')->on('jamurs');
            $table->foreign('budidaya_id')->references('id')->on('budidayas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kumbungs');
    }
}
