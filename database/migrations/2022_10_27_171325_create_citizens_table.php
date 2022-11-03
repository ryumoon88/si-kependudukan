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
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->char('id_number', 16)->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('address')->default('Live with parents');
            $table->enum('marital_status', ['Single', 'Married', 'Divorced'])->default('Single');
            $table->enum('religion', ['Islam', 'Protestan', 'Khatolik', 'Hindu', 'Buddha', 'Konghucu'])->nullable();
            $table->string('place_of_birth');
            $table->dateTime('date_of_birth');
            $table->enum('blood_type', ['A', 'B', 'AB', 'O'])->nullable();
            $table->string('profession')->nullable();
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
        Schema::dropIfExists('citizens');
    }
};