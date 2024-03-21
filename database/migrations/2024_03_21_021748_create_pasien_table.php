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
        Schema::create('tbl_pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien', 255);
            $table->char('jenis_kelamin_pasien', 1);
            $table->date('tgl_lahir_pasien');
            $table->integer('umur_pasien')->nullable();
            $table->text('alamat_pasien');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pasien');
    }
};
