@extends('layouts.admin')
@section('title', 'Data CV')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
  <div class="d-block mb-4 mb-md-0">
    <h2 class="h4">Data CV</h2>
    <p class="mb-0">Kelola data CV.</p>
  </div>
  <div>
    <a href="{{ route('cv.create') }}" class="btn btn-success text-white">
      <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
      Tambah CV
    </a>
  </div>
</div>

@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="row">
  <div class="col-12 mb-4">
    <div class="card border-0 shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-centered table-nowrap mb-0 rounded align-middle">
            <thead class="thead-light">
              <tr>
                <th class="border-0">No</th>
                <th class="border-0">Nama</th>
                <th class="border-0">Email</th>
                <th class="border-0">Telepon</th>
                <th class="border-0 rounded-end text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($cvs as $cv)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td class="fw-bold">{{ $cv->nama }}</td>
                  <td>{{ $cv->email }}</td>
                  <td>{{ $cv->telepon }}</td>
                  <td class="text-center">
                    <a href="{{ route('cv.show', $cv->id) }}" class="btn btn-secondary btn-sm">Lihat</a>
                    <a href="{{ route('cv.edit', $cv->id) }}" class="btn btn-info btn-sm text-white">Edit</a>
                    <form action="{{ route('cv.destroy', $cv->id) }}" method="POST" style="display:inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"
                              onclick="return confirm('Apakah Anda yakin ingin menghapus data CV ini?')">
                        Hapus
                      </button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="text-center py-4 text-muted">Belum ada data CV. Silakan tambah data baru.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
