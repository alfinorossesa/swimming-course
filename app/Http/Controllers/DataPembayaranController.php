<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataPembayaranRequest;
use App\Models\DataPembayaran;
use App\Models\DataSiswa;
use App\Services\DataPembayaranService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataPembayaranController extends Controller
{
    protected $dataPembayaranService;
    public function __construct(DataPembayaranService $dataPembayaranService)
    {
        $this->dataPembayaranService = $dataPembayaranService;
    }

    public function index()
    {
        $pembayaran = DataPembayaran::latest()->get();

        return view('admin.data-pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $siswa = DataSiswa::latest()->get();

        return view('admin.data-pembayaran.create', compact('siswa'));
    }

    public function store(DataPembayaranRequest $request)
    {
        $this->dataPembayaranService->storeData($request);

        return redirect()->route('data-pembayaran.index')->with('success', 'Data Pembayaran berhasil ditambahkan!');
    }

    public function destroy(DataPembayaran $pembayaran)
    {
        $pembayaran->delete();
        File::delete('images/bukti-pembayaran/'.$pembayaran->bukti_pembayaran);

        return back()->with('destroy', 'Data pembayaran berhasil dihapus!');
    }
}
