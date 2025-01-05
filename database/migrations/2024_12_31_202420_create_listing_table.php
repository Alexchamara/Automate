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
        Schema::create('listing', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('advert_id')->constrained('advert')->onDelete('cascade');
            $table->enum('status', ['pendding', 'approved', 'rejected'])->default('pendding');
            $table->timestamp('status_updated_at')->nullable();
            $table->boolean('isActive')->default(true);
            $table->enum('payment_status', ['paid', 'unpaid', 'rejected'])->default('unpaid');
            $table->timestamp('payment_status_updated_at')->nullable();
            $table->timestamp('expiration_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing');
    }
};
