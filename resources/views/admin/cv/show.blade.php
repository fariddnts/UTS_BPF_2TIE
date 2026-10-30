@extends('layouts.admin')
@section('title', 'Detail CV')

@section('content')
<div class="py-4">
  <h2 class="h4">Curriculum Vitae</h2>
</div>

<div class="card border-0 shadow mb-4">
  <div class="card-body p-4">
    <h2 class="mb-1">{{ $cv->nama }}</h2>
    <p class="text-muted mb-0">
      {{ $cv->email }} &bull; {{ $cv->telepon }}
      @if ($cv->alamat) &bull; {{ $cv->alamat }} @endif
    </p>
    <hr>

    <h5 class="mt-4">Tentang Saya</h5>
    <p>{!! nl2br(e($cv->tentang)) ?: '-' !!}</p>

    <h5 class="mt-4">Pendidikan</h5>
    <p>{!! nl2br(e($cv->pendidikan)) ?: '-' !!}</p>

    <h5 class="mt-4">Pengalaman</h5>
    <p>{!! nl2br(e($cv->pengalaman)) ?: '-' !!}</p>

    <h5 class="mt-4">Skill</h5>
    <p>{!! nl2br(e($cv->skill)) ?: '-' !!}</p>

    <div class="mt-4">
      <a href="{{ route('cv.edit', $cv->id) }}" class="btn btn-info text-white">Edit</a>
      <a href="{{ route('cv.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
  </div>
</div>
@endsection
