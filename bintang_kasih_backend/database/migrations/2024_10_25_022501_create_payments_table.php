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
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->enum('isChurch_Member', ['Ya', 'Tidak']);
            $table->text('imageChurchMember')->nullable();
            $table->string('regisWave');
            $table->string('classType');
            $table->string('paymentSPI');
            $table->string('paymentSPP');
            $table->string('paymentTotal');
            $table->text('imagePayment')->nullable();
            $table->string('paymentStatus')->default('PENDING');

            $table->unsignedBigInteger('students_id');
            $table->foreign('students_id')->references('id')->on('students')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
