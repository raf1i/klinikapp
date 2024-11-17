@extends('layouts.app_modern', ['title' => 'Detail Pendaftaran'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Pendaftaran</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Pasien</th>
                            <td>{{ $daftar->pasien->nama }}</td>
                        </tr>
                        <tr>
                            <th>No Pasien</th>
                            <td>{{ $daftar->pasien->no_pasien }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $daftar->pasien->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Daftar</th>
                            <td>{{ $daftar->tanggal_daftar->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <th>Poli</th>
                            <td>{{ $daftar->poli->nama }}</td>
                        </tr>
                        <tr>
                            <th>Keluhan</th>
                            <td>{{ $daftar->keluhan }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('daftar.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
