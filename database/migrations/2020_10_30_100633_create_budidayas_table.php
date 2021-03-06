<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudidayasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budidayas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('photo');
            $table->decimal('large', 6,2);
            $table->string('provinsi', 50)->nullable();
            $table->string('kabupaten', 50)->nullable();
            $table->string('kecamatan', 50)->nullable();
            $table->string('kelurahan', 50)->nullable();
            $table->string('detail_address', 100)->nullable();
            $table->enum('status', ['0', '1']);
            $table->timestamps();
            $table->unsignedBigInteger('owned_by_uid');
            $table->unsignedBigInteger('maintenance_by_uid')->nullable();

            $table->foreign('owned_by_uid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('maintenance_by_uid')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budidayas');
    }
}
