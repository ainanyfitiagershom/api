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
        Schema::create('tokenutilisateurs', function (Blueprint $table) {
            $table->id(); // id SERIAL
            $table->timestamp('expiration'); // expiration TIMESTAMP NOT NULL
            $table->string('token', 300); // token VARCHAR(300) NOT NULL
            $table->timestamp('daty'); // daty TIMESTAMP NOT NULL
            $table->unsignedBigInteger('idutilisateur');
            $table->foreignId('idutilisateur')->constrained('utilisateurs')->onDelete('cascade'); // FK
            $table->timestamps();

            $table->foreign('idrole')->references('idrole')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokenutilisateurs');
    }
};
