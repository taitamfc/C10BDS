<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->double('price');
            $table->string('description');
            $table->double('area');
            $table->string('juridical');
            $table->string('google_map');
            $table->double('street_width');
            $table->string('created_ad');
            $table->unsignedBigInteger('product_category_id');
            $table->foreign('product_category_id')->references('id')->on('product_categories');
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->unsignedBigInteger('ward_id');
            $table->foreign('ward_id')->references('id')->on('wards');
           
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
        //
    }
};
