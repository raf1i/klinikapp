@extends('layouts.app_modern')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Pendaftaran</div>
                <div class="card-body">
                    <form action="{{ route('daftar.store') }}" method="POST">
                        @csrf

                        <!-- Dropdown untuk Pasien -->
                        <div class="mb-3">
                            <label for="pasien_id" class="form-label">Pasien</label>
                            <select name="pasien_id" id="pasien_id" class="form-control" required>
                                <option value="" disabled selected>Pilih Pasien</option>
                                @foreach ($pasiens as $pasien)
                                    <option value="{{ $pasien->id }}">{{ $pasien->no_pasien }} - {{ $pasien->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Dropdown untuk Poli -->
                        <div class="mb-3">
                            <label for="poli_id" class="form-label">Poli</label>
                            <select name="poli_id" id="poli_id" class="form-control" required>
                                <option value="" disabled selected>Pilih Poli</option>
                                @foreach ($polis as $poli)
                                    <option value="{{ $poli->id }}">{{ $poli->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Input Tanggal -->
                        <div class="mb-3">
                            <label for="tanggal_daftar" class="form-label">Tanggal Daftar</label>
                            <input type="date" name="tanggal_daftar" id="tanggal_daftar" class="form-control" required>
                        </div>

                        <!-- Input Keluhan -->
                        <div class="mb-3">
                            <label for="keluhan" class="form-label">Keluhan</label>
                            <textarea name="keluhan" id="keluhan" class="form-control" rows="3" required></textarea>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('daftar.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
