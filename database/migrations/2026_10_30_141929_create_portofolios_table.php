<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Portofolio_1065', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('tempat_tanggal_lahir', 100)->nullable();
            $table->string('jenis_kelamin', 20)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('telepon', 25)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('instagram', 100)->nullable();
            $table->string('github', 100)->nullable();
            $table->string('foto')->nullable();
            $table->text('tentang')->nullable();
            $table->text('kemampuan')->nullable();
            $table->text('pendidikan')->nullable();
            $table->text('pengalaman')->nullable();
            $table->text('proyek')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Portofolio_1065');
    }
};
