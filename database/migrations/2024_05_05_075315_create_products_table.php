<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ProductCode', 100)->unique();
            $table->string('ProductName', 100);
            $table->string('ProductType', 50)->nullable();
            $table->string('ProductUnit', 50)->nullable();
            $table->string('ProductPrice', 250)->nullable();
            $table->longText('Notes')->nullable();
            $table->string('CreatedBy', 100)->nullable();
            $table->string('UpdateBy', 100)->nullable();
            // $table->boolean('IsActive')->default(1);
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
        Schema::dropIfExists('products');
    }
}
