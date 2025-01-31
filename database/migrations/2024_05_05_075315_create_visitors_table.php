<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('FullName', 100);
            $table->integer('ContactNo')->nullable();
            $table->string('Email', 50)->nullable();
            $table->string('IdentificationNo', 50);
            $table->string('PersonPhoto', 50)->nullable();
            $table->string('IdentificationPhoto', 50)->nullable();
            $table->longText('Notes')->nullable();
            $table->string('CreatedBy', 100)->nullable();
            $table->string('UpdatedBy', 100)->nullable();
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
        Schema::dropIfExists('visitors');
    }
}
