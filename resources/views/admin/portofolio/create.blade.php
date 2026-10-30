@extends('layouts.admin')
@section('title', 'Buat CV')

@section('content')
<div class="py-4">
  <h2 class="h4">Buat CV Baru</h2>
  <p class="mb-0">Setelah disimpan, CV akan langsung ditampilkan.</p>
</div>

<div class="card border-0 shadow mb-4">
  <div class="card-body">
    <form action="{{ route('portofolio.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @include('admin.portofolio._form')
    </form>
  </div>
</div>
@endsection
