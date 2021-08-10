<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->integer('apartment_type')->comment('1 = sale, 2 = rent');
            $table->string('title');
            $table->longText('description');
            $table->string('price');
            $table->string('size')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('zip_code')->nullable()->default(null);
            $table->string('rooms')->nullable()->default(null);
            $table->string('bedrooms')->nullable()->default(null);
            $table->string('bathrooms')->nullable()->default(null);
            $table->string('year_built')->nullable()->default(null);
            $table->dateTime('available_from')->nullable()->default(null);
            $table->string('garage')->nullable()->default(null);
            $table->string('garage_size')->nullable()->default(null);
            $table->string('floors_count')->nullable()->default(null);
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
        Schema::dropIfExists('properties');
    }
}
