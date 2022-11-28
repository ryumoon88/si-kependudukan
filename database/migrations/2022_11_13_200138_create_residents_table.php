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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('birth_id');
            $table->char('id_number', 16);

            $table->string('email');
            $table->char('phone_number', 20);
            $table->enum('blood_type', ['A', 'B', 'AB', 'O']);
            $table->enum('religion', ['Islam', 'Protestan', 'Khatolik', 'Hindu', 'Buddha', 'Khonghucu']);
            $table->string('profession');

            $table->foreignId('province_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('district_id')->nullable();
            $table->foreignId('village_id')->nullable();
            $table->string('address');

            $table->ulid('ulid');

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
        Schema::dropIfExists('residents');
    }
};