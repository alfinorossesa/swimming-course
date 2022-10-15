@extends('admin.layouts.main')
@section('content')
<div class="container-fluid">

    <h1 class="h5 mb-3 text-gray-800">Olah Data Pembayaran</h1>

    {{-- alert --}}
    @include('admin.alerts.alert')

    <div class="card shadow mb-5">
        <div class="card-header py-3">
            <a href="{{ route('data-pembayaran.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pembayaran
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal Bayar</th>
                            <th>Jumlah Bayar</th>
                            <th>Bukti Bayar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($pembayaran as $item)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $item->dataSiswa->nama }}</td>
                                <td>{{ date('d-M-Y', strtotime($item->tanggal_bayar)) }}</td>
                                <td>Rp. {{ number_format($item->jumlah_bayar) }}</td>
                                <td><img src="{{ asset('images/bukti-pembayaran/'.$item->bukti_pembayaran) }}" alt="foto" width="200px"></td>
                                <td>Valid</td>
                                <td>
                                    <a href="{{ route('data-pembayaran.edit', $item->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm rounded-circle border-0">
                                        <i class="fas fa-pen fa-sm text-white-100"></i>
                                    </a>
                                    <form class="d-inline" action="{{ route('data-pembayaran.destroy', $item->id) }}" method="post">
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
@endsection