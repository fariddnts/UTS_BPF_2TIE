
@extends('layouts.admin')

@section('title', 'CV ' . $p->nama)

@section('content')

@php
    use Illuminate\Support\Facades\Storage;

    $fotoTersedia = !empty($p->foto)
        && Storage::disk('public')->exists($p->foto);

    $urlFoto = $fotoTersedia
        ? asset('storage/' . $p->foto)
        : null;
@endphp

<style>
    .cv-wrap {
        max-width: 1000px;
        margin: 0 auto 2rem;
        display: flex;
        flex-wrap: wrap;
        background: #fff;
        color: #1f2937;
        border-radius: .5rem;
        overflow: hidden;
        box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.15);
    }

    .cv-left {
        flex: 0 0 35%;
        max-width: 35%;
        background: #2fa8d8;
        color: #fff;
        padding: 2rem 1.5rem;
    }

    .cv-right {
        flex: 1 1 0;
        min-width: 0;
        padding: 2rem;
    }

    .cv-photo {
        width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid #fff;
        display: block;
        margin: 0 auto 1.5rem;
    }

    .cv-initial {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        color: #2fa8d8;
        font-size: 4rem;
        font-weight: 800;
    }

    .cv-left h5 {
        color: #fff;
        text-transform: uppercase;
        letter-spacing: .3rem;
        text-align: right;
        border-bottom: 2px solid #fff;
        padding-bottom: .4rem;
        margin: 1.8rem 0 1rem;
    }

    .cv-left ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .cv-left li {
        margin-bottom: .6rem;
        word-break: break-word;
    }

    .cv-name {
        color: #2fa8d8;
        font-weight: 800;
        text-transform: uppercase;
        line-height: 1.1;
        font-size: 2.2rem;
        margin-bottom: 1rem;
    }

    .cv-title {
        display: inline-block;
        min-width: 65%;
        background: #2fa8d8;
        color: #fff;
        font-weight: 700;
        padding: .4rem 1.4rem;
        border-radius: 2rem;
        margin: 1.2rem 0 .9rem;
    }

    .cv-label {
        color: #6b7280;
        font-size: .85rem;
        margin: 0;
    }

    .cv-value {
        font-weight: 700;
        margin-bottom: .8rem;
    }

    .cv-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .cv-list li {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: .5rem;
    }

    .cv-ket {
        white-space: nowrap;
        color: #4b5563;
    }

    .cv-left .cv-ket {
        color: #e0f2fe;
    }

    @media (max-width: 768px) {
        .cv-left,
        .cv-right {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    @media print {
        .sidebar,
        .navbar,
        .cv-toolbar,
        .alert {
            display: none !important;
        }

        main.content {
            margin: 0 !important;
            padding: 0 !important;
        }

        .cv-wrap {
            box-shadow: none;
        }

        * {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    }
</style>

{{-- TOOLBAR --}}
<div class="cv-toolbar d-flex justify-content-between flex-wrap align-items-center py-4">

    <div>
        <h2 class="h4">CV {{ $p->nama }}</h2>
        <p class="mb-0">CV dibuat otomatis dari data yang Anda input.</p>
    </div>

    <div>
        <button onclick="window.print()" class="btn btn-secondary">
            Cetak / Simpan PDF
        </button>

        <a href="{{ route('portofolio.edit', $p->id) }}"
           class="btn btn-info text-white">
            Edit
        </a>

        <a href="{{ route('portofolio.index') }}"
           class="btn btn-success text-white">
            Daftar CV
        </a>
    </div>

</div>

{{-- PESAN SUKSES --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">

        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close">
        </button>

    </div>
@endif

{{-- CV --}}
<div class="cv-wrap">

    {{-- KOLOM KIRI --}}
    <div class="cv-left">

        {{-- FOTO PROFIL --}}
        @if ($fotoTersedia)

            <img
                src="{{ $urlFoto }}"
                alt="Foto {{ $p->nama }}"
                class="cv-photo"
                onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';"
            >

            <div class="cv-photo cv-initial" style="display: none;">
                {{ strtoupper(substr($p->nama, 0, 1)) }}
            </div>

        @else

            <div class="cv-photo cv-initial">
                {{ strtoupper(substr($p->nama, 0, 1)) }}
            </div>

        @endif

        {{-- KONTAK --}}
        <h5>Kontak</h5>

        <ul>
            @if ($p->telepon)
                <li>📞 {{ $p->telepon }}</li>
            @endif

            @if ($p->email)
                <li>✉️ {{ $p->email }}</li>
            @endif

            @if ($p->instagram)
                <li>📷 {{ $p->instagram }}</li>
            @endif

            @if ($p->github)
                <li>💻 {{ $p->github }}</li>
            @endif
        </ul>

        {{-- KEMAMPUAN --}}
        @if (count($p->daftar('kemampuan')))

            <h5>Kemampuan</h5>

            <ul>
                @foreach ($p->daftar('kemampuan') as $item)
                    <li>
                        ■ {{ $item['teks'] }}

                        @if ($item['ket'])
                            <span class="cv-ket">
                                ({{ $item['ket'] }})
                            </span>
                        @endif
                    </li>
                @endforeach
            </ul>

        @endif

        {{-- PENGALAMAN --}}
        @if (count($p->daftar('pengalaman')))

            <h5>Pengalaman</h5>

            <ul>
                @foreach ($p->daftar('pengalaman') as $item)
                    <li>
                        ■ {{ $item['teks'] }}

                        @if ($item['ket'])
                            <br>
                            <span class="cv-ket">
                                {{ $item['ket'] }}
                            </span>
                        @endif
                    </li>
                @endforeach
            </ul>

        @endif

    </div>

    {{-- KOLOM KANAN --}}
    <div class="cv-right">

        {{-- NAMA --}}
        <div class="cv-name">
            {{ $p->nama }}
        </div>

        {{-- TENTANG SAYA --}}
        @if ($p->tentang)
            <p>{!! nl2br(e($p->tentang)) !!}</p>
        @endif

        {{-- DATA PRIBADI --}}
        <div class="cv-title">
            DATA PRIBADI
        </div>

        <p class="cv-label">Nama</p>
        <p class="cv-value">{{ $p->nama }}</p>

        @if ($p->tempat_tanggal_lahir)
            <p class="cv-label">Tempat, Tanggal Lahir</p>
            <p class="cv-value">{{ $p->tempat_tanggal_lahir }}</p>
        @endif

        @if ($p->jenis_kelamin)
            <p class="cv-label">Jenis Kelamin</p>
            <p class="cv-value">{{ $p->jenis_kelamin }}</p>
        @endif

        @if ($p->alamat)
            <p class="cv-label">Alamat</p>
            <p class="cv-value">{{ $p->alamat }}</p>
        @endif

        {{-- RIWAYAT PENDIDIKAN --}}
        @if (count($p->daftar('pendidikan')))

            <div class="cv-title">
                RIWAYAT PENDIDIKAN
            </div>

            <ul class="cv-list">
                @foreach ($p->daftar('pendidikan') as $item)
                    <li>
                        <span>{{ $item['teks'] }}</span>
                        <span class="cv-ket">{{ $item['ket'] }}</span>
                    </li>
                @endforeach
            </ul>

        @endif

        {{-- PORTOFOLIO / PROYEK --}}
        @if (count($p->daftar('proyek')))

            <div class="cv-title">
                PORTOFOLIO / PROYEK
            </div>

            <ul class="cv-list">
                @foreach ($p->daftar('proyek') as $item)
                    <li>
                        <span>{{ $item['teks'] }}</span>
                        <span class="cv-ket">{{ $item['ket'] }}</span>
                    </li>
                @endforeach
            </ul>

        @endif

    </div>

</div>

@endsection
