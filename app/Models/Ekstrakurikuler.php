<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'kelas',
        'ekskul',
        'no_ortu',
    ];

    public function pesertas()
    {
        return $this->belongsToMany(Peserta::class, 'ekstrakurikuler_peserta');
    }
}
