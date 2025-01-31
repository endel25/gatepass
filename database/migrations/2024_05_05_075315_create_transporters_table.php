<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporters', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('TransporterName', 250);
            $table->string('TransporterCode', 50);
            $table->string('Email', 50)->nullable();
            $table->string('Address', 250)->nullable();
            $table->string('City', 50)->nullable();
            $table->integer('PinCode')->nullable();
            $table->integer('ContactNo')->nullable();
            $table->string('CreatedBy', 100)->nullable();
            $table->string('UpdateBy', 100)->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transporters');
    }
}
