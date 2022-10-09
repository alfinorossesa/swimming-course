<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataJadwalLatihanRequest;
use App\Models\DataJadwalLatihan;
use App\Models\DataPelatih;
use App\Models\DataSiswa;
use Illuminate\Http\Request;

class DataJadwalLatihanController extends Controller
{
    public function index()
    {
        $jadwalLatihan = DataJadwalLatihan::latest()->get();

        return view('admin.data-jadwal-latihan.index', compact('jadwalLatihan'));
    }

    public function create()
    {
        $pelatih = DataPelatih::latest()->get();
        $siswa = DataSiswa::latest()->get();

        return view('admin.data-jadwal-latihan.create', compact('pelatih', 'siswa'));
    }

    public function store(DataJadwalLatihanRequest $request)
    {
        DataJadwalLatihan::create($request->all());

        return redirect()->route('data-jadwal-latihan.index')->with('success', 'Jadwal Latihan berhasil ditambahkan!');
    }

    public function edit(DataJadwalLatihan $jadwalLatihan)
    {
        $pelatih = DataPelatih::latest()->get();
        $siswa = DataSiswa::latest()->get();

        return view('admin.data-jadwal-latihan.edit', compact('jadwalLatihan', 'pelatih', 'siswa'));
    }

    public function update(DataJadwalLatihanRequest $request, DataJadwalLatihan $jadwalLatihan)
    {
        $jadwalLatihan->update($request->all());

        return redirect()->route('data-jadwal-latihan.index')->with('update', 'Jadwal Latihan berhasil diupdate!');
    }

    public function destroy(DataJadwalLatihan $jadwalLatihan)
    {
        $jadwalLatihan->delete();

        return back()->with('destroy', 'Jadwal Latihan berhasil dihapus!');
    }
}
