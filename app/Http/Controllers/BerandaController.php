<?php

namespace App\Http\Controllers;

use App\Models\DataJadwalLatihan;
use App\Models\DataSiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tanggal = Carbon::now();
        $latihanHariIni = DataJadwalLatihan::where('hari', $tanggal->toDateString())->latest()->get();
        $siswa = DataSiswa::where('created_at', 'LIKE', '%'. $tanggal->toDateString() .'%')->latest()->get();

        return view('admin.index', compact('tanggal', 'latihanHariIni', 'siswa'));
    }
}
