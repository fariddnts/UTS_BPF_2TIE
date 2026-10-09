<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'Daftar Mahasiswa';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'Form Tambah Mahasiswa';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'Simpan Data Mahasiswa';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if ($id == 'detail') {
            return view('halaman-mahasiswa');
        } elseif ($id == 'profil') {
            return view('halaman-mahasiswa-profil');
        }

        return 'Parameter: ' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'Form Edit Mahasiswa: ' . $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'Update Mahasiswa: ' . $id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'Hapus Mahasiswa: ' . $id;
    }
}
