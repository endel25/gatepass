<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('FirstName', 100);
            $table->string('LastName', 100)->nullable();
            $table->string('LicenseNo', 30)->unique('LicenseNo_2');
            $table->string('TranspoterName', 250)->nullable();
            $table->string('DriverPhoto', 100)->nullable();
            $table->string('LicencePhoto', 100)->nullable()->unique('licenseNo');
            $table->longText('Notes')->nullable();
            $table->tinyInteger('Active')->default(1);
            $table->tinyInteger('Balcklisted')->default(0);
            $table->string('CreatedBy', 100)->nullable();
            $table->string('UpdateBy', 100)->nullable();
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
        Schema::dropIfExists('drivers');
    }
}
