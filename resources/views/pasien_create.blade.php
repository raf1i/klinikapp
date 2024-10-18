@extends('layouts.app_modern', ['title' => 'Tambah Data Pasien'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Form Pasien</div>
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Pasien</h5>
                        <form action="{{ route('pasien.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-1 mb-3">
                                <label for="foto">Foto Pasien (jpg, jpeg, png)</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto" onchange="previewImage(event)">
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <!-- Tempat untuk Preview Gambar -->
                                <div class="mt-3">
                                    <img id="preview-image" src="" alt="Preview Foto" style="max-width: 200px; display: none;">
                                </div>
                            </div>

                            <div class="form-group mt-1 mb-3">
                                <label for="nama">Nama Pasien</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-1 mb-3">
                                <label for="no_pasien">Nomor Pasien</label>
                                <input type="text" class="form-control @error('no_pasien') is-invalid @enderror" id="no_pasien" name="no_pasien" value="{{ old('no_pasien') }}">
                                @error('no_pasien')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-1 mb-3">
                                <label for="umur">Umur</label>
                                <input type="number" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur" value="{{ old('umur') }}">
                                @error('umur')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-1 mb-3">
                                <label for="jenis_kelamin">Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="laki-laki" {{ old('jenis_kelamin') === 'laki-laki' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="laki_laki">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" {{ old('jenis_kelamin') === 'perempuan' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                                @error('jenis_kelamin')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-1 mb-3">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}">
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan Script untuk Preview Gambar -->
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
