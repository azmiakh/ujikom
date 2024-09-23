<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Peserta extends Authenticatable
{
    use Notifiable;

    public function ekstrakurikulers()
    {
        return $this->belongsToMany(Ekstrakurikuler::class, 'ekstrakurikuler_peserta');
    }

    protected $fillable = [
        'name',
        'registration_number',
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
    ];
}
