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
            $table->text('description')->nullable();
            $table->timestamp('panen_at', 0)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('pemasukan_id')->nullable();

            $table->foreign('pemasukan_id')->references('id')->on('pemasukans')->onDelete('cascade');
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
