@extends('layouts.app')

@section('title', 'Daftar Buku Tamu')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-list me-2"></i>Daftar Buku Tamu</h5>
                    <a href="{{ route('buku-tamu.create') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-plus me-1"></i>Tambah Tamu
                    </a>
                </div>
            </div>
            <div class="card-body">
                <!-- Form Pencarian -->
                <form method="GET" action="{{ route('buku-tamu.index') }}" class="mb-3">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" name="search" class="form-control" 
                                   placeholder="Cari berdasarkan nama, alamat, telepon, email, atau gereja..." 
                                   value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search me-1"></i>Cari
                            </button>
                        </div>
                    </div>
                </form>

                @if($bukuTamu->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Jenis Ibadah</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bukuTamu as $tamu)
                                <tr>
                                    <td>{{ $loop->iteration + ($bukuTamu->currentPage() - 1) * $bukuTamu->perPage() }}</td>
                                    <td>{{ $tamu->nama_lengkap }}</td>
                                    <td>{{ Str::limit($tamu->alamat, 30) }}</td>
                                    <td>{{ $tamu->no_telepon }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ $tamu->jenis_ibadah }}</span>
                                    </td>
                                    <td>{{ $tamu->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('buku-tamu.show', $tamu) }}" class="btn btn-outline-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('buku-tamu.edit', $tamu) }}" class="btn btn-outline-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="POST" action="{{ route('buku-tamu.destroy', $tamu) }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" 
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $bukuTamu->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada data tamu</h5>
                        <p class="text-muted">Silakan tambahkan data tamu pertama Anda</p>
                        <a href="{{ route('buku-tamu.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>Tambah Tamu Pertama
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection