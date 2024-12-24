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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik');
            $table->string('fullName');
            $table->string('nickName');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('birthPlace');
            $table->date('birthDate');
            $table->string('religion');
            $table->string('childOf');
            $table->text('domicileAddress');
            $table->text('kkAddress');
            $table->enum('isPKH_KIP', ['Ya', 'Tidak']);
            $table->text('image');
            $table->text('imageKK');
            $table->text('imageBirthCert');
            $table->text('imagePKH_KIP')->nullable();
            $table->string('status')->default('INACTIVE');
            $table->string('classType');
            
            $table->unsignedBigInteger('parents_id');
            $table->foreign('parents_id')->references('id')->on('parents')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
