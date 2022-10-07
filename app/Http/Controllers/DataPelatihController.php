<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataPelatihRequest;
use App\Models\DataPelatih;
use App\Services\DataPelatihService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataPelatihController extends Controller
{
    protected $dataPelatihService;
    public function __construct(DataPelatihService $dataPelatihService)
    {
        $this->dataPelatihService = $dataPelatihService;
    }

    public function index()
    {
        $pelatih = DataPelatih::latest()->get();

        return view('admin.data-pelatih.index', compact('pelatih'));
    }

    public function create()
    {
        return view('admin.data-pelatih.create');
    }

    public function store(DataPelatihRequest $request)
    {
        $this->dataPelatihService->storeData($request);

        return redirect()->route('data-pelatih.index')->with('success', 'Pelatih berhsail ditambahkan!');
    }

    public function edit(DataPelatih $dataPelatih)
    {
        return view('admin.data-pelatih.edit', compact('dataPelatih'));
    }

    public function update(DataPelatihRequest $request, DataPelatih $dataPelatih)
    {
        $this->dataPelatihService->updateData($dataPelatih, $request);

        return redirect()->route('data-pelatih.index')->with('update', 'Pelatih berhasil diupdate!');
    }

    public function destroy(DataPelatih $dataPelatih)
    {
        $dataPelatih->delete();
        File::delete('images/foto/'.$dataPelatih->foto);

        return redirect()->route('data-pelatih.index')->with('destroy', 'Pelatih berhsail dihapus!');
    }
}
