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
        Schema::create('service_requests', function (Blueprint $table) {
        $table->id('request_id'); // Use 'id' for primary key
$table->foreignId('user_id')->constrained()->onDelete('cascade'); // Laravel's way for farmer_id
$table->string('service_type');
$table->integer('quantity_kg');
$table->text('notes')->nullable();
$table->string('status')->default('Pending');
$table->timestamps(); // Replaces request_date
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
