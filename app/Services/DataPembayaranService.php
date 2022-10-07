<?php

namespace App\Services;

use App\Models\DataPembayaran;

class DataPembayaranService
{
    public function storeData($request)
    {
        $bukti_pembayaran = $request->file('bukti_pembayaran');
        $nama_bukti_pembayaran = time()."_".$bukti_pembayaran->getClientOriginalName();
        $bukti_pembayaran->move('images/bukti-pembayaran',$nama_bukti_pembayaran);

        return DataPembayaran::create([
            'siswa_id' => $request->siswa_id,
            'tanggal_bayar' => $request->tanggal_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'bukti_pembayaran' => $nama_bukti_pembayaran
        ]);
    }
}