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
        Schema::create('parents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fatherName');
            $table->string('fatherNIK');
            $table->text('fatherAddress');
            $table->string('fatherReligion');
            $table->string('fatherLastEdu');
            $table->string('fatherJob');
            $table->string('fatherSallary');
            $table->string('fatherPhone');
            $table->string('motherName');
            $table->string('motherNIK');
            $table->text('motherAddress');
            $table->string('motherReligion');
            $table->string('motherLastEdu');
            $table->string('motherJob');
            $table->string('motherSallary');
            $table->string('motherPhone');
            $table->integer('students_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
