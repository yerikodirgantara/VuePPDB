<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik')->nullable();
            $table->string('npp')->nullable();
            $table->string('fullName');
            $table->string('shortName');
            $table->string('gender');
            $table->string('birthPlace');
            $table->date('birthDate');
            $table->string('phone');
            $table->string('address');
            $table->string('lastEdu');
            $table->string('classType');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
