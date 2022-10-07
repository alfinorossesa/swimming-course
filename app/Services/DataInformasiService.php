<?php

namespace App\Services;

use App\Models\DataInformasi;
use Illuminate\Support\Facades\File;

class DataInformasiService
{
    public function storeData($request)
    {
        $foto = $request->file('foto');
        $nama_foto = time()."_".$foto->getClientOriginalName();
        $foto->move('images/info',$nama_foto);

        return DataInformasi::create([
            'user_id' => auth()->user()->id,
            'judul_info' => $request->judul_info,
            'detail_info' => $request->detail_info,
            'foto' => $nama_foto
        ]);
    }

    public function udpateData($dataInformasi, $request)
    {
        if($request->hasFile('foto')){
            File::delete('images/info/'.$dataInformasi->foto);
        }

        $updateDataInformasi = $dataInformasi->update($request->all());

        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $nama_foto = time()."_".$foto->getClientOriginalName();
            $foto->move('images/info',$nama_foto);
            $dataInformasi->foto = $nama_foto;
            $dataInformasi->update();     
        }

        return $updateDataInformasi;
    }
}