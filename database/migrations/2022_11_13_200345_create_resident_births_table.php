<?php

use App\Models\Resident;
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
        Schema::create('resident_births', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Resident::class, 'father_id')->nullable();
            $table->foreignIdFor(Resident::class, 'mother_id')->nullable();
            $table->string('name');
            $table->dateTime('birth_date');
            $table->string('birth_place');
            $table->enum('gender', ['Male', 'Female']);
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
        Schema::dropIfExists('resident_births');
    }
};