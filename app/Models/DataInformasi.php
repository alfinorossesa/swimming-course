<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataInformasi extends Model
{
    use HasFactory;
    protected $table = 'data_informasi';
    protected $guarded = ['id'];

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
