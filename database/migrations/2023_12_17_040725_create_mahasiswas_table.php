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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('namaLengkap');
            $table->string('email')->unique();
            $table->string('alamatktp');
            $table->string('alamat');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('nomortlp');
            $table->string('nomorhp');
            $table->enum('kewarganegaraan', ["WNI Asli", "WNI Keturunan", "WNA"])->nullable();
            $table->string("asalWNA");
            $table->string("tanggallahir");
            $table->string("tempatlahir");
            $table->enum("jk", ["Laki-laki", "Perempuan"]);
            $table->enum("statusMenikah", ["Belum Menikah", "Menikah", "Lain-lain"]);
            $table->string("agama");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
