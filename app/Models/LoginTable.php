<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginTable extends Model
{
    use HasFactory;

    protected $table = 'logintables';

    protected $fillable = [
        'name',
        'nomor_pendaftaran',
    ];
}
