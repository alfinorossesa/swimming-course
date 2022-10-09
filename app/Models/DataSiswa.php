<?php

namespace App\Models;

use App\Traits\Siswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class DataSiswa extends Authenticatable 
{
    use HasFactory, HasApiTokens, Siswa;
    protected $guard = 'siswa';
    protected $table = 'data_siswa';
    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function dataPembayaran()
    {
        return $this->hasMany(DataPembayaran::class, 'siswa_id');
    }

    public function jadwalLatihan()
    {
        return $this->hasMany(DataJadwalLatihan::class, 'siswa_id');
    }

    public function perkembanganSiswa()
    {
        return $this->hasMany(DataPerkembanganSiswa::class, 'siswa_id');
    }

}
