@extends('layouts.admin')
@section('title', 'Edit CV')

@section('content')
<div class="py-4">
  <h2 class="h4">Edit CV</h2>
  <p class="mb-0">Ubah data CV lalu simpan.</p>
</div>

<div class="card border-0 shadow mb-4">
  <div class="card-body">
    <form action="{{ route('cv.update', $cv->id) }}" method="POST">
      @csrf
      @method('PUT')
      @include('admin.cv._form')
    </form>
  </div>
</div>
@endsection
