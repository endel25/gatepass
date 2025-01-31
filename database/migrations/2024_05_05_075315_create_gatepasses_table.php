<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGatepassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gatepasses', function (Blueprint $table) {
            $table->integer('id', true);
            $table->dateTime('GatepassEntryTime')->nullable();
            $table->string('GatepassType', 50)->nullable();
            $table->string('TransactionType', 100)->nullable();
            $table->string('CompanyID', 250)->nullable();
            $table->string('VehicleNo', 250);
            $table->string('TrailerNo', 250)->nullable();
            $table->string('TransporterID', 250)->nullable();
            $table->string('DriverID', 250)->nullable();
            $table->string('D_licenseNo', 250)->nullable();
            $table->binary('Driver_Camscan')->nullable();
            $table->string('Driver_Note', 250)->nullable();
            $table->string('VisitFor', 300)->nullable();
            $table->string('Status', 250)->nullable();
            $table->string('TareWeight', 50)->nullable();
            $table->string('GrossWeight', 50)->nullable();
            $table->string('NetWeight', 50)->nullable();
            $table->dateTime('GatepassExitTime')->nullable();
            $table->integer('UserId')->nullable();
            $table->tinyInteger('ReturnCheck')->nullable()->default(0);
            $table->string('Remark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gatepasses');
    }
}
