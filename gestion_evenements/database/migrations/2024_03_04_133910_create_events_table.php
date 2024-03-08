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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('description');
            $table->date('event_date');
            $table->date('event_fin');
            $table->string('lieu');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->integer('nombre_places');
            $table->enum('accept_mode',['automatique','manuel'])->nullable();
            $table->softDeletes();
            $table->enum('validation',['valid','invalid'])->default('invalid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
