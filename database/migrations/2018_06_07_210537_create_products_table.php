<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('avatar')->default('products/product.png');
            $table->string('brand_name');
            $table->string('model_name');
            $table->string('network')->nullable();
            $table->string('band');
            $table->string('comunication_protocol');
            $table->string('gps_chip')->nullable();
            $table->integer('gps_accuracy');
            $table->string('car_charger')->nullable();
            $table->string('wall_charger')->nullable();
            $table->string('battery');
            $table->integer('battery_life');
            $table->integer('standby');
            $table->string('cpu')->nullable();
            $table->string('certificate')->nullable();
            $table->string('item_size');
            $table->integer('weight')->nullable();
            $table->string('gps_module')->nullable();
            $table->string('operation_temp')->nullable();
            $table->float('price', 8, 2);
            $table->boolean('published');
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
