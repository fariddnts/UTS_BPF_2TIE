
@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">Edit CV</h4>
            <p class="text-muted mb-0">Perbarui informasi CV dan Portofolio kamu.</p>
        </div>

        <a href="{{ route('portofolio.show', $portofolio->id) }}"
           class="btn btn-secondary">
            Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('portofolio.update', $portofolio->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- DATA PRIBADI --}}
                <h5 class="mb-3">Data Pribadi</h5>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Lengkap *</label>
                        <input type="text"
                               name="nama"
                               class="form-control"
                               value="{{ old('nama', $portofolio->nama) }}"
                               required>
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tempat, Tanggal Lahir</label>
                        <input type="text"
                               name="tempat_tanggal_lahir"
                               class="form-control"
                               value="{{ old('tempat_tanggal_lahir', $portofolio->tempat_tanggal_lahir) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki"
                                {{ old('jenis_kelamin', $portofolio->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>
                            <option value="Perempuan"
                                {{ old('jenis_kelamin', $portofolio->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text"
                               name="alamat"
                               class="form-control"
                               value="{{ old('alamat', $portofolio->alamat) }}">
                    </div>
                </div>

                {{-- KONTAK --}}
                <h5 class="mb-3 mt-3">Kontak</h5>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="text"
                               name="telepon"
                               class="form-control"
                               value="{{ old('telepon', $portofolio->telepon) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email', $portofolio->email) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Instagram</label>
                        <input type="text"
                               name="instagram"
                               class="form-control"
                               value="{{ old('instagram', $portofolio->instagram) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">GitHub</label>
                        <input type="text"
                               name="github"
                               class="form-control"
                               value="{{ old('github', $portofolio->github) }}">
                    </div>
                </div>

                {{-- FOTO --}}
                <h5 class="mb-3 mt-3">Foto</h5>

                <div class="mb-3">
                    <input type="file"
                           name="foto"
                           class="form-control"
                           accept="image/jpeg,image/png,image/webp">

                    <small class="text-muted d-block mt-2">
                        Pilih foto jika ingin mengganti foto CV.
                        Kosongkan jika tidak ingin mengganti foto.
                        Format jpg/png/webp, maksimal 2 MB.
                    </small>

                    @error('foto')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- ISI CV --}}
                <h5 class="mb-3 mt-4">Isi CV</h5>

                <p class="text-muted small">
                    Untuk kolom di bawah: satu baris = satu data.
                    Gunakan tanda | untuk memisahkan keterangan,
                    misalnya tahun.
                </p>

                <div class="mb-3">
                    <label class="form-label">Tentang Saya (profil singkat)</label>
                    <textarea name="tentang"
                              class="form-control"
                              rows="4">{{ old('tentang', $portofolio->tentang) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kemampuan</label>
                    <textarea name="kemampuan"
                              class="form-control"
                              rows="4">{{ old('kemampuan', $portofolio->kemampuan) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pendidikan</label>
                    <textarea name="pendidikan"
                              class="form-control"
                              rows="4">{{ old('pendidikan', $portofolio->pendidikan) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pengalaman</label>
                    <textarea name="pengalaman"
                              class="form-control"
                              rows="4">{{ old('pengalaman', $portofolio->pengalaman) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Proyek</label>
                    <textarea name="proyek"
                              class="form-control"
                              rows="4">{{ old('proyek', $portofolio->proyek) }}</textarea>
                </div>

                {{-- TOMBOL --}}
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('portofolio.show', $portofolio->id) }}"
                       class="btn btn-secondary">
                        Batal
                    </a>

                    <button type="submit" class="btn btn-info text-white">
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
