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
        Schema::create('facture', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name1');
            $table->string('name2');
            $table->string('email');
            $table->string('mob');
            $table->string('adress');
            $table->string('country');
            $table->string('city');
            $table->string('id_commande');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facture');
    }
};
