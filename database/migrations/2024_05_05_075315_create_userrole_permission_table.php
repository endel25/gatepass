<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserrolePermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userrole_permission', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('PermissionId')->nullable();
            $table->integer('UserRoleId')->nullable();
            $table->boolean('IsRead')->nullable();
            $table->boolean('IsCreate')->nullable();
            $table->boolean('IsUpdate')->nullable();
            $table->boolean('IsDelete')->nullable();
            $table->boolean('IsExecute')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userrole_permission');
    }
}
