@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<h5 class="mb-3">Data Pribadi</h5>
<div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">Nama Lengkap *</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $portofolio->nama ?? '') }}">
  </div>
  <div class="col-md-6 mb-3">
    <label class="form-label">Tempat, Tanggal Lahir</label>
    <input type="text" name="tempat_tanggal_lahir" class="form-control" placeholder="Pekanbaru, 12 Juli 2006"
           value="{{ old('tempat_tanggal_lahir', $portofolio->tempat_tanggal_lahir ?? '') }}">
  </div>
  <div class="col-md-4 mb-3">
    <label class="form-label">Jenis Kelamin</label>
    @php $jk = old('jenis_kelamin', $portofolio->jenis_kelamin ?? ''); @endphp
    <select name="jenis_kelamin" class="form-select">
      <option value="">- Pilih -</option>
      <option value="Laki-laki" {{ $jk == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
      <option value="Perempuan" {{ $jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
  </div>
  <div class="col-md-8 mb-3">
    <label class="form-label">Alamat</label>
    <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $portofolio->alamat ?? '') }}">
  </div>
</div>

<h5 class="mb-3 mt-2">Kontak</h5>
<div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">Telepon</label>
    <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $portofolio->telepon ?? '') }}">
  </div>
  <div class="col-md-6 mb-3">
    <label class="form-label">Email</label>
    <input type="text" name="email" class="form-control" value="{{ old('email', $portofolio->email ?? '') }}">
  </div>
  <div class="col-md-6 mb-3">
    <label class="form-label">Instagram</label>
    <input type="text" name="instagram" class="form-control" placeholder="@username"
           value="{{ old('instagram', $portofolio->instagram ?? '') }}">
  </div>
  <div class="col-md-6 mb-3">
    <label class="form-label">GitHub</label>
    <input type="text" name="github" class="form-control" placeholder="github.com/fariddnts"
           value="{{ old('github', $portofolio->github ?? '') }}">
  </div>
</div>

<h5 class="mb-3 mt-2">Foto</h5>
<div class="mb-3">
  @if (!empty($portofolio->foto))
    <div class="mb-2">
      <img src="{{ asset('storage/' . $portofolio->foto) }}" alt="Foto" class="rounded-circle"
           style="width:90px;height:90px;object-fit:cover">
      <small class="text-muted d-block">Kosongkan jika tidak ingin mengganti foto.</small>
    </div>
  @endif
  <input type="file" name="foto" class="form-control" accept="image/*">
  <small class="text-muted">jpg/png/webp, maksimal 2 MB.</small>
</div>

<h5 class="mb-3 mt-2">Isi CV</h5>
<p class="text-muted small">Untuk kolom di bawah: <b>satu baris = satu data</b>. Pakai tanda <code>|</code> untuk memisahkan keterangan (misalnya tahun).</p>

<div class="mb-3">
  <label class="form-label">Tentang Saya (profil singkat)</label>
  <textarea name="tentang" rows="3" class="form-control">{{ old('tentang', $portofolio->tentang ?? '') }}</textarea>
</div>

<div class="mb-3">
  <label class="form-label">Kemampuan</label>
  <textarea name="kemampuan" rows="4" class="form-control" placeholder="PHP &amp; Laravel&#10;MySQL&#10;HTML, CSS, Bootstrap">{{ old('kemampuan', $portofolio->kemampuan ?? '') }}</textarea>
</div>

<div class="mb-3">
  <label class="form-label">Riwayat Pendidikan</label>
  <textarea name="pendidikan" rows="4" class="form-control" placeholder="Politeknik Caltex Riau (Teknik Informatika) | 2025 - sekarang&#10;SMAN 1 Contoh | 2022 - 2025">{{ old('pendidikan', $portofolio->pendidikan ?? '') }}</textarea>
</div>

<div class="mb-3">
  <label class="form-label">Pengalaman</label>
  <textarea name="pengalaman" rows="4" class="form-control" placeholder="Asisten Praktikum - Politeknik Caltex Riau | 2026">{{ old('pengalaman', $portofolio->pengalaman ?? '') }}</textarea>
</div>

<div class="mb-3">
  <label class="form-label">Proyek / Portofolio</label>
  <textarea name="proyek" rows="4" class="form-control" placeholder="Aplikasi CRUD Pelanggan (Laravel) | 2026&#10;Dashboard Admin Volt | 2026">{{ old('proyek', $portofolio->proyek ?? '') }}</textarea>
</div>

<button type="submit" class="btn btn-primary">Simpan &amp; Buat CV</button>
<a href="{{ route('portofolio.index') }}" class="btn btn-secondary">Kembali</a>
