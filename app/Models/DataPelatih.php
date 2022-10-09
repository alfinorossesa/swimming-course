<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class DataPelatih extends Authenticatable 
{
    use HasFactory, HasApiTokens;
    protected $guard = 'pelatih';
    protected $table = 'data_pelatih';
    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function jadwalLatihan()
    {
        return $this->hasMany(DataJadwalLatihan::class, 'pelatih_id');
    }

    public function perkembanganSiswa()
    {
        return $this->hasMany(DataPerkembanganSiswa::class, 'pelatih_id');
    }
}
