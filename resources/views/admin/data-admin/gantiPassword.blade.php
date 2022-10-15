@extends('admin.layouts.main')
@section('content')

{{-- alert --}}
<div class="mx-5">
    @include('admin.alerts.alert')
</div>

<div class="card shadow my-5 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('data-admin.updatePassword', $user->id) }}" method="post">
            @csrf
            @method('put')
            
            <div class="form-group">
                <div class="mb-3">
                    <label for="password_lama">Password Lama</label>
                    <input type="password" class="form-control @error('password_lama') is-invalid @enderror" id="password_lama" name="password_lama" placeholder="Password Lama" required>
                    @error('password_lama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror     
                </div>  
                <div class="mb-3">
                    <label for="password">Password Baru</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password Baru" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror     
                </div>  
                <div class="mb-3">
                    <label for="password_confirmation">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password Baru" required>
                    @error('password_confirmation')
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