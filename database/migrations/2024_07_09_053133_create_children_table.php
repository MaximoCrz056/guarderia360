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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('middlename');
            $table->string('lastname');
            $table->date('birthdate');
            //$table->foreignId('parent_id')->constrained('parents')->onDelete('cascade'); // TODO: add foreign key
            $table->string('photo');
            $table->string('gender');
            $table->double('height');
            $table->double('weight');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};
