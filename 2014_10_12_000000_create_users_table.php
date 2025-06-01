<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('plan')->nullable(); // Add plan column
            $table->string('trainer')->nullable(); // Add trainer column
            $table->date('expiration')->nullable(); // Add expiration column
            $table->rememberToken();
            $table->timestamps();
            
        });
    }

    public function down(): void {
        Schema::dropIfExists('users');
    }
};
