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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id(); // id SERIAL
            $table->string('email', 255)->unique(); // email VARCHAR(255) UNIQUE
            $table->string('mdp', 300); // mdp VARCHAR(300) NOT NULL
            $table->string('nom', 300); // nom VARCHAR(300) NOT NULL
            $table->boolean('isverified')->default(false); // isverified BOOLEAN NOT NULL
            $table->integer('tentative')->default(0); // tentative INT NOT NULL DEFAULT 0
            $table->integer('idrole')->nullable();
            $table->timestamps();

            $table->foreign('idrole')->references('idrole')->on('roles');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('utilisateurr_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
