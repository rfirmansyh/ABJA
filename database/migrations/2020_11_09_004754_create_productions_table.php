<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->timestamp('done_at', 0)->nullable();
            $table->enum('status', ['0', '1'])->default('0')->comment = "0 = Tidak Produksi, 1 = Progress Produksi";
            $table->bigInteger('harvest_total')->nullable()->comment = "Gram";
            $table->unsignedBigInteger('maked_by_uid');
            $table->unsignedBigInteger('updated_by_uid');
            $table->unsignedBigInteger('production_type_id');
            $table->unsignedBigInteger('kumbung_id');

            $table->foreign('production_type_id')->references('id')->on('production_types');
            $table->foreign('maked_by_uid')->references('id')->on('users');
            $table->foreign('updated_by_uid')->references('id')->on('users');
            $table->foreign('kumbung_id')->references('id')->on('kumbungs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productions');
    }
}
