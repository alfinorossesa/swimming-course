<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPerkembanganSiswa extends Model
{
    use HasFactory;
    protected $table = 'data_perkembangan_siswa';
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
