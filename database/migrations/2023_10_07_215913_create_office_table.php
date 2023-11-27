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
        Schema::create('office', function (Blueprint $table) {
            $table->id('ID');
            $table->string('office_name',50);
            $table->string('ofice_adress',150);
            $table->string('office_code',15);
            $table->string('phone',20);
            $table->string('email',30);
            $table->string('password',150);
            $table->string('zip_code',20);
            $table->string('city',50);
            $table->string('country',50);
            $table->string('province',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office');
    }
};
