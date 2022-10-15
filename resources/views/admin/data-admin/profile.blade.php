@extends('admin.layouts.main')
@section('content')

{{-- alert --}}
<div class="mx-5">
    @include('admin.alerts.alert')
</div>

<div class="card shadow my-5 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('data-admin.updateProfile', $user->id) }}" method="post">
            @csrf
            @method('put')
            
            <div class="form-group">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $user->nama) }}" required>
                    @error('nama')
                        <div class="is-invalid text-danger">
                            {{ $message }}
                        </div>
                    @enderror  
                </div>  
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                    @error('username')
                        <div class="is-invalid text-danger">
                            {{ $message }}
                        </div>
                    @enderror   
                </div>  
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3" required>{{ old('alamat', $user->alamat) }}</textarea>
                    @error('alamat')
                        <div class="is-invalid text-danger">
                            {{ $message }}
                        </div>
                    @enderror    
                </div>  
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No. Telepon</label>
                    <input type="number" id="no_telp" name="no_telp" class="form-control" value="{{ old('no_telp', $user->no_telp) }}" required>
                    @error('no_telp')
                        <div class="is-invalid text-danger">
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