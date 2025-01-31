<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('permissionName', 100);
            $table->string('Action', 10);
            $table->decimal('SortOrder', 5, 3);
            $table->integer('ParentFeatureID')->nullable();
            $table->boolean('IsMaster');
            $table->boolean('IsCreateDisplay');
            $table->boolean('IsReadDisplay');
            $table->boolean('IsUpdateDisplay');
            $table->boolean('IsDeleteDisplay');
            $table->boolean('IsExecuteDisplay');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
