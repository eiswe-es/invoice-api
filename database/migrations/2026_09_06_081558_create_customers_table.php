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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_code',20)->unique();
            $table->string('name',150);
            $table->string('email')->nullable()->index();
            $table->string('phone',30)->nullable();
            $table->string('tax_number',50)->nullable()->unique();
            $table->string('billing_address')->nullable();
            $table->boolean('is_active')->default(true)->index();

            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
