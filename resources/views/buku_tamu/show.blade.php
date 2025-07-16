@extends('layouts.app')

@section('title', 'Detail Tamu')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0"><i class="fas fa-eye me-2"></i>Detail Tamu</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="40%">Nama Lengkap</th>
                                <td>: {{ $bukuTamu->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>: {{ $bukuTamu->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: {{ $bukuTamu->alamat }}</td>
                            </tr>
                            <tr>
                                <th>No. Telepon</th>
                                <td>: {{ $bukuTamu->no_telepon }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="40%">Email</th>
                                <td>: {{ $bukuTamu->email ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Gereja Asal</th>
                                <td>: {{ $bukuTamu->gereja_asal ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Ibadah</th>
                                <td>: <span class="badge bg-info">{{ $bukuTamu->jenis_ibadah }}</span></td>
                            </tr>
                            <tr>
                                <th>Tanggal Daftar</th>
                                <td>: {{ $bukuTamu->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($bukuTamu->keterangan)
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <h6><strong>Keterangan:</strong></h6>
                            <p class="text-muted">{{ $bukuTamu->keterangan }}</p>
                        </div>
                    </div>
                @endif

                <div class="d-flex justify-content-between">
                    <a href="{{ route('buku-tamu.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Kembali
                    </a>
                    <div>
                        <a href="{{ route('buku-tamu.edit', $bukuTamu) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <form method="POST" action="{{ route('buku-tamu.destroy', $bukuTamu) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" 
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash me-1"></i>Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection