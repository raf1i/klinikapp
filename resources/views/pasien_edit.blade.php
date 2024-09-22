@extends('layouts.app') <!-- Pastikan layout app.blade.php ada -->

@section('content')
<div class="container">
    <h2>Edit Data Pasien</h2>

    <!-- Form untuk mengedit data pasien -->
    <form method="POST" action="{{ route('pasien.update', $pasien->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="no_pasien" class="form-label">Nomor Pasien</label>
            <input type="text" class="form-control" id="no_pasien" name="no_pasien" value="{{ $pasien->no_pasien }}" required>
        </div>
        
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pasien</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $pasien->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="umur" class="form-label">Umur</label>
            <input type="number" class="form-control" id="umur" name="umur" value="{{ $pasien->umur }}" required>
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="laki-laki" {{ $pasien->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="perempuan" {{ $pasien->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $pasien->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto Pasien (optional)</label>
            <input type="file" class="form-control" id="foto" name="foto">
            @if($pasien->foto)
                <img src="{{ Storage::url($pasien->foto) }}" alt="Foto Pasien" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection

