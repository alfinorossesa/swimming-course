<?php

namespace App\Services;

use App\Models\DataPelatih;
use Illuminate\Support\Facades\File;

class DataPelatihService
{
    public function storeData($request)
    {
        $foto = $request->file('foto');
        $nama_foto = time()."_".$foto->getClientOriginalName();
        $foto->move('images/foto',$nama_foto);

        return DataPelatih::create([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'foto' => $nama_foto,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
    }

    public function updateData($dataPelatih, $request)
    {
        if($request->hasFile('foto')){
            File::delete('images/foto/'.$dataPelatih->foto);
        }

        $dataPelatihUpdate = $dataPelatih->update($request->all());

        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $nama_foto = time()."_".$foto->getClientOriginalName();
            $foto->move('images/foto',$nama_foto);
            $dataPelatih->foto = $nama_foto;
            $dataPelatih->update();     
        }

        return $dataPelatihUpdate;
    }
}