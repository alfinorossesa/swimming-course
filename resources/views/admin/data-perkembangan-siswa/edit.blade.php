@extends('admin.layouts.main')
@section('content')
<div class="mx-5 my-5">
    <a href="{{ route('data-perkembangan-siswa.index') }}" class="text-secondary">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-chevron-left"></i> Kembali</h6>
    </a>
</div>

<div class="card shadow mt-3 mb-5 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Perkembangan Siswa</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('data-perkembangan-siswa.update', $dataPerkembanganSiswa->id) }}" method="post">
            @csrf
            @method('put')
            
            <div class="form-group">
                <div class="mb-3">
                    <label for="siswa_id">Siswa</label>
                    <select class="custom-select @error('siswa_id') is-invalid @enderror" name="siswa_id" id="siswa_id" required>
                        <option selected disabled>Pilih Siswa</option>
                        @foreach ($siswa as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $dataPerkembanganSiswa->siswa_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('siswa_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror     
                </div>  
                <div class="mb-3">
                    <label for="pelatih_id">Pelatih</label>
                    <select class="custom-select @error('pelatih_id') is-invalid @enderror" name="pelatih_id" id="pelatih_id" required>
                        <option selected disabled>Pilih Pelatih</option>
                        @foreach ($pelatih as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $dataPerkembanganSiswa->pelatih_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('pelatih_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror     
                </div>  
                <div class="mb-3">
                    <label for="tanggal_latihan">Tanggal Latihan</label>
                    <input type="date" class="form-control @error('tanggal_latihan') is-invalid @enderror" id="tanggal_latihan" name="tanggal_latihan" value="{{ old('tanggal_latihan', $dataPerkembanganSiswa->tanggal_latihan) }}" required>
                    @error('tanggal_latihan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror     
                </div>      
                <div class="mb-3">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi', $dataPerkembanganSiswa->lokasi) }}" placeholder="Lokasi" required>
                    @error('lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror     
                </div>  
                <div class="mb-3">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" rows="3" required placeholder="Keterangan">{{ old('keterangan', $dataPerkembanganSiswa->keterangan) }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror     
                </div>     
            </div>
            
            <button type="submit" class="btn btn-primary ">Simpan</button>
        </form>
    </div>
</div>
@endsection
