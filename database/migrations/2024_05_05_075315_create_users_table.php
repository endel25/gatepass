<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('UserRoleId')->index('UserRoleId');
            $table->string('FirstName', 50);
            $table->string('LastName', 50)->nullable();
            $table->string('UserName', 100)->unique('users_email_unique');
            $table->string('Password', 100);
            $table->string('ContectNo', 15)->nullable();
            $table->string('Email', 50)->nullable();
            $table->string('Address', 191)->nullable();
            $table->string('CreatedBy', 100)->nullable();
            $table->string('UpdateBy', 100)->nullable();
            $table->tinyInteger('Active')->default(1);
            $table->text('Notes')->nullable();
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
        Schema::dropIfExists('users');
    }
}
