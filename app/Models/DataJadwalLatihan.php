<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataJadwalLatihan extends Model
{
    use HasFactory;
    protected $table = 'data_jadwal_latihan';
    protected $guarded = ['id'];

    public function pelatih()
    {
        return $this->belongsTo(DataPelatih::class, 'pelatih_id');
    }

    public function siswa()
    {
        return $this->belongsTo(DataSiswa::class, 'siswa_id');
    }
}
