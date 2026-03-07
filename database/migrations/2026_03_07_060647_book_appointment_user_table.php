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
    Schema::create('book_appointment_user', function (Blueprint $table) {
        $table->id();
        $table->string('reference_number')->unique();
        $table->string('parent_name');
        $table->string('email');
        $table->date('appointment_date');
        $table->time('appointment_time');
        $table->string('purpose');
        $table->text('additional_note')->nullable();

        $table->enum('role', [
            'registrar',
            'cashier',
            'guidance',
            'elem',
            'sr',
            'none'
        ])->default('none');

        $table->enum('status', [
            'pending',
            'confirmed',
            'cancelled',
            'done'
        ])->default('pending');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_appointment_user');
    }
};
