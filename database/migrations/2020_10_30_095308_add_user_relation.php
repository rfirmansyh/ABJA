<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('photo');
            $table->string('phone');
            $table->text('bio');
            $table->text('address');
            $table->enum('status', ['0', '1']);
            $table->softDeletes();
            $table->unsignedBigInteger('role_id');
    
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropcolumn('photo');
            $table->dropcolumn('phone');
            $table->dropcolumn('bio');
            $table->dropcolumn('address');
            $table->dropcolumn('status', ['0', '1']);
            $table->dropcolumn('deleted_at');
            $table->dropcolumn('role_id');
            $table->dropforeign('user_role_id_foreign');
        });
    }
}
