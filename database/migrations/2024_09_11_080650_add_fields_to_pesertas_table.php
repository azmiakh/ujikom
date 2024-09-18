<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pesertas', function (Blueprint $table) {
            //
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('agama')->nullable();
            $table->text('alamat_lengkap')->nullable();
            $table->string('nik')->nullable();
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O'])->nullable();
            $table->integer('anak_ke')->nullable();
            $table->integer('total_saudara')->nullable();
            $table->string('foto_terbaru')->nullable();
            $table->string('akta_kelahiran')->nullable();
            $table->string('kartu_keluarga')->nullable();
            $table->string('surat_keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesertas', function (Blueprint $table) {
            //
            $table->dropColumn([
                'tanggal_lahir', 
                'jenis_kelamin', 
                'agama', 
                'alamat_lengkap', 
                'nik', 
                'golongan_darah', 
                'anak_ke', 
                'total_saudara', 
                'foto_terbaru', 
                'akta_kelahiran', 
                'kartu_keluarga', 
                'surat_keterangan',
            ]);
        });
    }
}
