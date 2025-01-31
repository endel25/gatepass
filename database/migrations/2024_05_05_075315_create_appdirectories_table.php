<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppdirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appdirectories', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('MasterName', 250)->nullable();
            $table->string('FieldName', 250)->nullable();
            $table->string('FieldValue', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appdirectories');
    }
}
