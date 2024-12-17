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
        Schema::create('pinutilisateurs', function (Blueprint $table) {
            Schema::create('pinutilisateurs', function (Blueprint $table) {
                $table->id(); // id SERIAL
                $table->timestamp('daty'); // daty TIMESTAMP NOT NULL
                $table->integer('code'); // code INT NOT NULL
                $table->timestamp('expiration')->nullable(); // expiration TIMESTAMP (peut être NULL)
                $table->foreignId('idutilisateur')->constrained('utilisateurs')->onDelete('cascade'); // FK
                $table->timestamps();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinutilisateurs');
    }
};
