<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('VehicleNo', 20)->unique('VehicleNumber');
            $table->string('VehicleType', 20)->nullable();
            $table->string('CreatedBy', 100)->nullable();
            $table->string('UpdateBy', 100)->nullable();
            $table->text('Notes')->nullable();
            $table->boolean('IsActive')->nullable()->default(1);
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
        Schema::dropIfExists('vehicles');
    }
}
