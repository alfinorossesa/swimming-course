@extends('admin.layouts.main')
@section('content')
<div class="mx-5 my-5">
    <a href="{{ route('data-pembayaran.index') }}" class="text-secondary">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-chevron-left"></i> Kembali</h6>
    </a>
</div>

<div class="card shadow mt-3 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Pembayaran</h6>
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <div class="mb-3">
                    <label for="siswa_id">Nama Siswa</label>
                    <select class="custom-select @error('siswa_id') is-invalid @enderror" name="siswa_id" id="siswa_id" required>
                        <option selected disabled>Pilih Siswa</option>
                        @foreach ($siswa as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('siswa_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror     
                </div>    
                <div class="mb-3">
                    <label for="tanggal_bayar">Tanggal Bayar</label>
                    <input type="date" class="form-control @error('tanggal_bayar') is-invalid @enderror" id="tanggal_bayar" name="tanggal_bayar" required>
                    @error('tanggal_bayar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror     
                </div>    
                <div class="mb-3">
                    <label for="jumlah_bayar">Jumlah Bayar</label>
                    <input type="number" class="form-control @error('jumlah_bayar') is-invalid @enderror" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Bayar" value="{{ old('jumlah_bayar') }}" required>
                    @error('jumlah_bayar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror     
                </div>  
                <div class="mb-3">
                    <label for="bukti_pembayaran">Bukti Pembayaran</label> <br>
                    <input type="file" class="@error('bukti_pembayaran') is-invalid @enderror" id="bukti_pembayaran" name="bukti_pembayaran" required onchange="previewImage()">
                    @error('bukti_pembayaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror     
                </div> 
                <img src="" alt="" class="img-preview mb-3" width="300px"> 
            </div>
            
            <button type="submit" class="btn btn-primary ">Simpan</button>
        </form>
    </div>
</div>
@endsection

@push('script')
    <script>
        function previewImage() {
            const image = document.querySelector('#bukti_pembayaran');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush