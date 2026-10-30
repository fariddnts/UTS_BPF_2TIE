@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
           value="{{ old('nama', $cv->nama ?? '') }}">
    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div class="col-md-6 mb-3">
    <label class="form-label">Email</label>
    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
           value="{{ old('email', $cv->email ?? '') }}">
    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div class="col-md-6 mb-3">
    <label class="form-label">Telepon</label>
    <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
           value="{{ old('telepon', $cv->telepon ?? '') }}">
    @error('telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div class="col-md-6 mb-3">
    <label class="form-label">Alamat</label>
    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
           value="{{ old('alamat', $cv->alamat ?? '') }}">
    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>
</div>

<div class="mb-3">
  <label class="form-label">Tentang Saya</label>
  <textarea name="tentang" rows="3" class="form-control @error('tentang') is-invalid @enderror">{{ old('tentang', $cv->tentang ?? '') }}</textarea>
  @error('tentang') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label class="form-label">Pendidikan</label>
  <textarea name="pendidikan" rows="3" class="form-control @error('pendidikan') is-invalid @enderror">{{ old('pendidikan', $cv->pendidikan ?? '') }}</textarea>
  @error('pendidikan') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label class="form-label">Pengalaman</label>
  <textarea name="pengalaman" rows="3" class="form-control @error('pengalaman') is-invalid @enderror">{{ old('pengalaman', $cv->pengalaman ?? '') }}</textarea>
  @error('pengalaman') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label class="form-label">Skill</label>
  <textarea name="skill" rows="3" class="form-control @error('skill') is-invalid @enderror">{{ old('skill', $cv->skill ?? '') }}</textarea>
  @error('skill') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('cv.index') }}" class="btn btn-secondary">Kembali</a>
