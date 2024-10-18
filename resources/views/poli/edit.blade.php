@extends('layouts.app_modern', ['title' => 'Edit Poli'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Poli</div>
                    <div class="card-body">
                        <form action="{{ route('poli.update', $poli->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Nama Poli</label>
                                <input type="text" name="nama" class="form-control" value="{{ $poli->nama }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="biaya">Biaya</label>
                                <input type="number" name="biaya" class="form-control" value="{{ $poli->biaya }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
