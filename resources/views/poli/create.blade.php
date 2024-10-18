@extends('layouts.app_modern', ['title' => 'Tambah Poli'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Poli</div>
                    <div class="card-body">
                        <form action="{{ route('poli.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Poli</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="biaya">Biaya</label>
                                <input type="number" name="biaya" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
