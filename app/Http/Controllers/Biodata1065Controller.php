<?php

namespace App\Http\Controllers;

use App\Models\Biodata1065;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Biodata1065Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataBiodata'] = Biodata1065::latest()->get();
        return view('admin.biodata_1065.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.biodata_1065.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string|max:100',
            'nim'           => 'required|numeric|unique:biodata_1065,nim',
            'jurusan'       => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'gender'        => 'required|in:Male,Female',
            'email'         => 'required|email|unique:biodata_1065,email',
            'alamat'        => 'required|string',
            'foto_profil'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nama.required'          => 'Nama lengkap wajib diisi!',
            'nim.required'           => 'NIM wajib diisi!',
            'nim.unique'             => 'NIM sudah terdaftar!',
            'jurusan.required'       => 'Jurusan wajib diisi!',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi!',
            'gender.required'        => 'Jenis kelamin wajib dipilih!',
            'email.required'         => 'Email wajib diisi!',
            'email.email'            => 'Format email tidak valid!',
            'email.unique'           => 'Email sudah terdaftar!',
            'alamat.required'        => 'Alamat wajib diisi!',
            'foto_profil.image'      => 'File harus berupa gambar!',
            'foto_profil.max'        => 'Ukuran foto maksimal 2MB!',
        ]);

        $data = [
            'nama'          => $request->nama,
            'nim'           => $request->nim,
            'jurusan'       => $request->jurusan,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gender'        => $request->gender,
            'email'         => $request->email,
            'alamat'        => $request->alamat,
        ];

        // Handle upload foto profil jika ada
        if ($request->hasFile('foto_profil')) {
            $fotoPath = $request->file('foto_profil')->store('foto_biodata', 'public');
            $data['foto_profil'] = $fotoPath;
        }

        Biodata1065::create($data);

        return redirect()->route('biodata1065.index')->with('success', 'Penambahan Data Biodata Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $biodata = Biodata1065::findOrFail($id);
        return view('admin.biodata1065.show', compact('biodata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataBiodata'] = Biodata1065::findOrFail($id);
        return view('admin.biodata1065.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $biodata = Biodata1065::findOrFail($id);

        $request->validate([
            'nama'          => 'required|string|max:100',
            'nim'           => 'required|numeric|unique:biodata_1065,nim,' . $biodata->id,
            'jurusan'       => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'gender'        => 'required|in:Male,Female',
            'email'         => 'required|email|unique:biodata_1065,email,' . $biodata->id,
            'alamat'        => 'required|string',
            'foto_profil'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nama.required'          => 'Nama lengkap wajib diisi!',
            'nim.required'           => 'NIM wajib diisi!',
            'nim.unique'             => 'NIM sudah terdaftar!',
            'jurusan.required'       => 'Jurusan wajib diisi!',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi!',
            'gender.required'        => 'Jenis kelamin wajib dipilih!',
            'email.required'         => 'Email wajib diisi!',
            'email.email'            => 'Format email tidak valid!',
            'email.unique'           => 'Email sudah terdaftar!',
            'alamat.required'        => 'Alamat wajib diisi!',
            'foto_profil.image'      => 'File harus berupa gambar!',
            'foto_profil.max'        => 'Ukuran foto maksimal 2MB!',
        ]);

        $biodata->nama          = $request->nama;
        $biodata->nim           = $request->nim;
        $biodata->jurusan       = $request->jurusan;
        $biodata->tanggal_lahir = $request->tanggal_lahir;
        $biodata->gender        = $request->gender;
        $biodata->email         = $request->email;
        $biodata->alamat        = $request->alamat;

        // Cek jika user upload foto baru
        if ($request->hasFile('foto_profil')) {
            // Hapus file foto lama jika ada
            if ($biodata->foto_profil && Storage::disk('public')->exists($biodata->foto_profil)) {
                Storage::disk('public')->delete($biodata->foto_profil);
            }
            $biodata->foto_profil = $request->file('foto_profil')->store('foto_biodata', 'public');
        }

        $biodata->save();

        return redirect()->route('biodata1065.index')->with('success', 'Perubahan Data Biodata Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $biodata = Biodata1065::findOrFail($id);

        if ($biodata->foto_profil && Storage::disk('public')->exists($biodata->foto_profil)) {
            Storage::disk('public')->delete($biodata->foto_profil);
        }

        $biodata->delete();

        return redirect()->route('biodata1065.index')->with('success', 'Penghapusan Data Biodata Berhasil!');
    }
}
