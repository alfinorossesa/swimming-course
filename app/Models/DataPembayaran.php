<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPembayaran extends Model
{
    use HasFactory;
    protected $table = 'data_pembayaran';
    protected $guarded = ['id'];

    public function dataSiswa()
    {
        return $this->belongsTo(DataSiswa::class, 'siswa_id');
    }
}
