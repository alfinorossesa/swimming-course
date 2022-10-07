@extends('admin.layouts.main')
@section('content')
<div class="container-fluid">
    {{-- alert --}}
    @include('admin.alerts.alert')

    <div class="card shadow my-4 mt-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jadwal Hari Ini - {{ date('d M Y', strtotime($tanggal->toDateString())) }}</h6>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pelatih</th>
                                <th>Hari</th>
                                <th>Jam</th>
                                <th>Lokasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latihanHariIni as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $item->pelatih->nama }}</td>
                                    <td>{{ date('d-M-Y', strtotime($item->hari)) }}</td>
                                    <td>{{ date('H:i', strtotime($item->jam)) }} WIB</td>
                                    <td>{{ $item->lokasi }}</td>
                                    <td>
                                        <form class="d-inline" action="{{ route('data-jadwal-latihan.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm rounded-circle border-0" onclick="return confirm('Apakah anda yakin ?')"><i class="fas fa-trash fa-sm text-white-100"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow my-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pendaftaran Baru</h6>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Alamat</th>
                                    <th>No. Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($siswa as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->no_telp }}</td>
                                        <td>
                                            <a href="{{ route('data-siswa.show', $item->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm rounded-circle border-0">
                                                <i class="fas fa-info-circle fa-sm text-white-100"></i>
                                            </a>
                                            <form class="d-inline" action="{{ route('data-siswa.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm rounded-circle border-0" onclick="return confirm('Apakah anda yakin ?')"><i class="fas fa-trash fa-sm text-white-100"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection