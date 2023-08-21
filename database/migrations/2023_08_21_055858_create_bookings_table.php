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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('address');
            $table->string('city');
            $table->string('zip_code')->nullable();
            $table->foreignId('car_id')->constrained()->cascadeOnDelete();
            $table->integer('price')->default(0);
            $table->integer('vat')->default(0);
            $table->integer('total_price')->default(0);
            $table->enum('booking_status', ['Pending', 'On Delivery', 'On Rent', 'Finished', 'Cancel'])->default('Pending');
            $table->string('payment_method')->default('Midtrans');
            $table->enum('payment_status', ['Pending', 'Success', 'Failed'])->default('Pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
