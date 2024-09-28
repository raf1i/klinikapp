@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit&nbsp;Data&nbsp;Pasien</h2>

    <!-- Form untuk mengedit data pasien -->
    <form method="POST" action="{{ route('pasien.update', $pasien->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="no_pasien" class="form-label">Nomor&nbsp;Pasien</label>
            <input type="text" class="form-control @error('no_pasien') is-invalid @enderror" id="no_pasien" name="no_pasien" value="{{ old('no_pasien', $pasien->no_pasien) }}" required>
            @error('no_pasien')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="nama" class="form-label">Nama&nbsp;Pasien</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $pasien->nama) }}" required>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="umur" class="form-label">Umur</label>
            <input type="number" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur" value="{{ old('umur', $pasien->umur) }}" required>
            @error('umur')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis&nbsp;Kelamin</label>
            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="laki-laki" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="perempuan" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat', $pasien->alamat) }}</textarea>
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto&nbsp;Pasien&nbsp;(optional)</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" onchange="previewImage(event)">
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <!-- Tampilkan foto pasien yang sudah ada -->
            @if($pasien->foto)
                <div class="mt-2">
                    <img id="preview-image" src="{{ asset('uploads/pasien/' . $pasien->foto) }}" alt="Foto&nbsp;Pasien" width="100">
                </div>
            @else
                <!-- Tempat untuk preview gambar baru -->
                <img id="preview-image" src="" alt="Preview Foto" style="display:none; max-width: 100px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan&nbsp;Perubahan</button>
    </form>
</div>

<!-- Script untuk Preview Gambar -->
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview-image');
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection
