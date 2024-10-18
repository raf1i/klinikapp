@extends('layouts.app_modern', ['title' => 'Data Poli'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Poli</div>
                    <div class="card-body">
                        <h3>Data Poli</h3>
                        <div class="row mb-3 mt-3">
                            <div class="col-md-6">
                                <a href="{{ route('poli.create') }}" class="btn btn-primary btn-sm">Tambah Poli</a>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Poli</th>
                                    <th>Biaya</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($polis as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ 'Rp' . number_format($item->biaya, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('poli.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            |
                                            <form action="{{ route('poli.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $polis->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
