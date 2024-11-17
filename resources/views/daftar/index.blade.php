<div>
    @extends('layouts.app_modern', ['title' => 'Pendaftaran'])

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3 mt-3">
                            <div class="col-md-3 h3">
                                Pendaftaran Klinik
                            </div>
                            <div class="col-md-6">
                                <!-- Form Pencarian -->
                                <form class="d-flex" action="{{ route('daftar.index') }}" method="GET">
                                    <input class="form-control me-2" type="text" name="search" placeholder="Cari Nama atau Poli" value="{{ request('search') }}" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('daftar.create') }}" class="btn btn-primary btn-md float-end">
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                        <!-- Tabel Data -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>No Pasien</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Poli</th>
                                    <th>Keluhan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($daftar as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->pasien->nama }}</td>
                                        <td>{{ $item->pasien->no_pasien }}</td>
                                        <td>{{ $item->pasien->jenis_kelamin }}</td>
                                        <td>{{ $item->tanggal_daftar->format('d M Y') }}</td>
                                        <td>{{ $item->poli->nama }}</td>
                                        <td>{{ $item->keluhan }}</td>
                                        <td>
                                            <a href="{{ route('daftar.show', $item->id) }}" class="btn btn-warning btn-sm">
                                                Detail
                                            </a>
                                            <a href="{{ route('daftar.edit', $item->id) }}" class="btn btn-sm btn-success">
                                                Edit
                                            </a>
                                            <form action="{{ route('daftar.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        {{ $daftar->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</div>
