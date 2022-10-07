<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataSiswaRequest;
use App\Models\DataPembayaran;
use App\Models\DataPerkembanganSiswa;
use App\Models\DataSiswa;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    public function index()
    {
        $siswa = DataSiswa::latest()->get();

        return view('admin.data-siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('admin.data-siswa.create');
    }

    public function store(DataSiswaRequest $request)
    {
        DataSiswa::create($request->all());

        return redirect()->route('data-siswa.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function show(DataSiswa $dataSiswa)
    {
        $pembayaran = DataPembayaran::where('siswa_id', $dataSiswa->id)->latest()->get();
        $dataPerkembanganSiswa = DataPerkembanganSiswa::where('siswa_id', $dataSiswa->id)->latest()->get();

        return view('admin.data-siswa.show', compact('dataSiswa', 'pembayaran', 'dataPerkembanganSiswa'));
    }

    public function edit(DataSiswa $dataSiswa)
    {
        return view('admin.data-siswa.edit', compact('dataSiswa'));
    }

    public function update(DataSiswa $dataSiswa, DataSiswaRequest $request)
    {
        $dataSiswa->update($request->all());

        return redirect()->route('data-siswa.index')->with('update', 'Siswa berhasil diupdate!');
    }

    public function destroy(DataSiswa $dataSiswa)
    {
        $dataSiswa->delete();

        return back()->with('destroy', 'Siswa berhasil dihapus!');
    }
}
