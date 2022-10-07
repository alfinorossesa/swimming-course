<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataInformasiRequest;
use App\Models\DataInformasi;
use App\Services\DataInformasiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataInformasiController extends Controller
{
    protected $dataInformasiService;
    public function __construct(DataInformasiService $dataInformasiService)
    {
        $this->dataInformasiService = $dataInformasiService;
    }

    public function index()
    {
        $informasi = DataInformasi::latest()->get();

        return view('admin.data-informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('admin.data-informasi.create');
    }

    public function store(DataInformasiRequest $request)
    {
        $this->dataInformasiService->storeData($request);

        return redirect()->route('data-informasi.index')->with('success', 'Informasi berhasil ditambahkan!');
    }

    public function edit(DataInformasi $dataInformasi)
    {
        return view('admin.data-informasi.edit', compact('dataInformasi'));
    }

    public function update(DataInformasi $dataInformasi, DataInformasiRequest $request)
    {
        $this->dataInformasiService->udpateData($dataInformasi, $request);

        return redirect()->route('data-informasi.index')->with('update', 'Informasi berhasil diupdate!');
    }

    public function destroy(DataInformasi $dataInformasi)
    {
        $dataInformasi->delete();
        File::delete('images/info/'.$dataInformasi->foto);
        
        return redirect()->route('data-informasi.index')->with('destroy', 'Informasi berhasil dihapus!');
    }
}
