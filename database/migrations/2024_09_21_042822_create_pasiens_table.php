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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id(); // id int(10) PK:AI
            $table->string('no_pasien', 255); // no_pasien varchar(255)
            $table->string('nama', 255); // nama varchar(255)
            $table->string('jenis_kelamin', 255); // jenis_kelamin varchar(255)
            $table->string('umur', 255); // umur varchar(255)
            $table->string('foto', 255)->nullable(); // foto varchar(255)
            $table->text('alamat')->nullable(); // alamat text null
            $table->timestamps(); // created_at & updated_at datetime
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
