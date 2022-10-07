<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataPerkembanganSiswaRequest;
use App\Models\DataPelatih;
use App\Models\DataPerkembanganSiswa;
use App\Models\DataSiswa;
use Illuminate\Http\Request;

class DataPerkembanganSiswaController extends Controller
{
    public function index()
    {
        $dataPerkembanganSiswa = DataPerkembanganSiswa::latest()->get();

        return view('admin.data-perkembangan-siswa.index', compact('dataPerkembanganSiswa'));
    }

    public function create()
    {
        $pelatih = DataPelatih::latest()->get();
        $siswa = DataSiswa::latest()->get();

        return view('admin.data-perkembangan-siswa.create', compact('pelatih', 'siswa'));
    }

    public function store(DataPerkembanganSiswaRequest $request)
    {
        DataPerkembanganSiswa::create($request->all());

        return redirect()->route('data-perkembangan-siswa.index')->with('success', 'Data perkembangan siswa berhasil ditambahkan!');
    }

    public function edit(DataPerkembanganSiswa $dataPerkembanganSiswa)
    {
        $pelatih = DataPelatih::latest()->get();
        $siswa = DataSiswa::latest()->get();

        return view('admin.data-perkembangan-siswa.edit', compact('dataPerkembanganSiswa', 'pelatih', 'siswa'));
    }

    public function update(DataPerkembanganSiswaRequest $request, DataPerkembanganSiswa $dataPerkembanganSiswa)
    {
        $dataPerkembanganSiswa->update($request->all());

        return redirect()->route('data-perkembangan-siswa.index')->with('update', 'Data perkembangan siswa berhasil diupdate!');
    }

    public function destroy(DataPerkembanganSiswa $dataPerkembanganSiswa)
    {
        $dataPerkembanganSiswa->delete();

        return back()->with('destroy', 'Data perkembangan siswa berhasil dihapus!');
    }
}
