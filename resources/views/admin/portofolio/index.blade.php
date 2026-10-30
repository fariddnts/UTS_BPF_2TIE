@extends('layouts.admin')
@section('title', 'CV & Portofolio')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
  <div class="d-block mb-4 mb-md-0">
    <h2 class="h4">CV &amp; Portofolio (Tabel: Portofolio_1065)</h2>
    <p class="mb-0">Isi data, lalu CV dibuat otomatis.</p>
  </div>
  <div>
    <a href="{{ route('portofolio.create') }}" class="btn btn-success text-white">
      <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
      Buat CV Baru
    </a>
  </div>
</div>

@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="card border-0 shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-centered table-nowrap mb-0 rounded align-middle">
        <thead class="thead-light">
          <tr>
            <th class="border-0">No</th>
            <th class="border-0">Foto</th>
            <th class="border-0">Nama</th>
            <th class="border-0">Email</th>
            <th class="border-0">Telepon</th>
            <th class="border-0 rounded-end text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($data as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>
                @if ($item->foto)
                  <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" class="rounded-circle shadow-sm"
                       style="width:45px;height:45px;object-fit:cover">
                @else
                  <span class="badge bg-secondary">No Foto</span>
                @endif
              </td>
              <td class="fw-bold">{{ $item->nama }}</td>
              <td>{{ $item->email ?: '-' }}</td>
              <td>{{ $item->telepon ?: '-' }}</td>
              <td class="text-center">
                <a href="{{ route('portofolio.show', $item->id) }}" class="btn btn-secondary btn-sm">Lihat CV</a>
                <a href="{{ route('portofolio.edit', $item->id) }}" class="btn btn-info btn-sm text-white">Edit</a>
                <form action="{{ route('portofolio.destroy', $item->id) }}" method="POST" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm"
                          onclick="return confirm('Hapus CV ini?')">Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center py-4 text-muted">Belum ada CV. Klik "Buat CV Baru".</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
