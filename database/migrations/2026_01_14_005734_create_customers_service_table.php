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
        Schema::create('customer_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onDelete('set null');
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('set null');
            $table->enum('service_type', ['tramite', 'hosting', 'otro'])->default('tramite');
            $table->timestamps();
        });
        
        Schema::create('customer_tramites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_service_id')->constrained('customer_services')->onDelete('cascade');
            $table->text('email');
            $table->text('password');
            $table->text('field_additional_1')->nullable();
            $table->text('field_additional_2')->nullable();
            $table->enum('status', ['completo', 'pendiente'])->default('pendiente');
            $table->text('comment')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_tramites');
        Schema::dropIfExists('customer_services');
    }
};
