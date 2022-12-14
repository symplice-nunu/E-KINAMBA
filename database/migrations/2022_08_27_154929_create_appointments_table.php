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
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('phone');
            $table->string('plateNumber');
            $table->string('carModel');
            $table->string('Service');
            $table->string('AdditionalService');
            $table->string('cost');
            $table->string('carwashdate');
            $table->string('email');
            $table->string('cleaner');
            $table->string('status');
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
        Schema::dropIfExists('appointment');
    }
};
