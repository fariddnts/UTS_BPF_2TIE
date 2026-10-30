@extends('layouts.admin')
@section('title', 'Tambah CV')

@section('content')
<div class="py-4">
  <h2 class="h4">Tambah CV</h2>
  <p class="mb-0">Isi data CV dengan lengkap.</p>
</div>

<div class="card border-0 shadow mb-4">
  <div class="card-body">
    <form action="{{ route('cv.store') }}" method="POST">
      @csrf
      @include('admin.cv._form')
    </form>
  </div>
</div>
@endsection
