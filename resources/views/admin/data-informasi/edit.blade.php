@extends('admin.layouts.main')
@section('content')
<div class="mx-5 my-5">
    <a href="{{ route('data-informasi.index') }}" class="text-secondary">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-chevron-left"></i> Kembali</h6>
    </a>
</div>

<div class="card shadow mt-3 mb-5 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Informasi</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('data-informasi.update', $dataInformasi->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            
            <div class="form-group">
                <div class="mb-3">
                    <label for="judul_info">Judul Informasi</label>
                    <input type="text" class="form-control @error('judul_info') is-invalid @enderror" id="judul_info" name="judul_info" placeholder="Judul Informasi" value="{{ old('judul_info', $dataInformasi->judul_info) }}" required>
                    @error('judul_info')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror     
                </div>   
                <div class="mb-3">
                    <label for="detail_info">Detail Informasi</label>
                    <textarea class="form-control @error('detail_info') is-invalid @enderror" name="detail_info" id="detail_info" rows="3" required placeholder="Detail Informasi">{{ old('detail_info', $dataInformasi->detail_info) }}</textarea>
                    @error('detail_info')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror     
                </div>  
                <div class="mb-3">
                    <label for="foto">Foto</label> <br>
                    <input type="file" class="@error('foto') is-invalid @enderror" id="foto" name="foto" onchange="previewImage()" value="{{ old('foto', $dataInformasi->foto) }}">
                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror     
                </div> 
                <img src="{{ $dataInformasi->foto ? asset('images/info/'.$dataInformasi->foto) : '' }}" alt="" class="img-preview mb-3" width="300px"> 
            </div>
            
            <button type="submit" class="btn btn-primary ">Simpan</button>
        </form>
    </div>
</div>
@endsection

@push('script')
    <script>
        function previewImage() {
            const image = document.querySelector('#foto');
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