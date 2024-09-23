<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guarded = [];

    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
