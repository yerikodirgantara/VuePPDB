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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); // Kolom ID auto-increment
            $table->bigInteger('nik')->unique(); // Gunakan bigInteger untuk NIK
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes(); // Menambahkan kolom deleted_at untuk soft deletes
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
            $table->string('roles')->default('SISWA'); // Default role sebagai 'SISWA'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
