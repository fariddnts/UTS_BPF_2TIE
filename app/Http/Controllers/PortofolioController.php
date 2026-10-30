<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    private function rules(): array
    {
        return [
            'nama'                 => 'required|string|max:100',
            'tempat_tanggal_lahir' => 'nullable|string|max:100',
            'jenis_kelamin'        => 'nullable|in:Laki-laki,Perempuan',
            'alamat'               => 'nullable|string|max:255',
            'telepon'              => 'nullable|string|max:25',
            'email'                => 'nullable|email|max:100',
            'instagram'            => 'nullable|string|max:100',
            'github'               => 'nullable|string|max:100',
            'foto'                 => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tentang'              => 'nullable|string',
            'kemampuan'            => 'nullable|string',
            'pendidikan'           => 'nullable|string',
            'pengalaman'           => 'nullable|string',
            'proyek'               => 'nullable|string',
        ];
    }

    public function index()
    {
        $data = Portofolio::latest()->get();
        return view('admin.portofolio.index', compact('data'));
    }

    public function create()
    {
        return view('admin.portofolio.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('portofolio', 'public');
        }

        $cv = Portofolio::create($validated);

        // Setelah input selesai, langsung tampilkan CV yang terbentuk
        return redirect()->route('portofolio.show', $cv->id)
            ->with('success', 'CV berhasil dibuat otomatis');
    }

    public function show(Portofolio $portofolio)
    {
        return view('admin.portofolio.show', ['p' => $portofolio]);
    }

    public function edit(Portofolio $portofolio)
    {
        return view('admin.portofolio.edit', compact('portofolio'));
    }

    public function update(Request $request, Portofolio $portofolio)
    {
        $validated = $request->validate($this->rules());

        if ($request->hasFile('foto')) {
            if ($portofolio->foto) {
                Storage::disk('public')->delete($portofolio->foto);
            }
            $validated['foto'] = $request->file('foto')->store('portofolio', 'public');
        }

        $portofolio->update($validated);

        return redirect()->route('portofolio.show', $portofolio->id)
            ->with('success', 'CV berhasil diperbarui');
    }

    public function destroy(Portofolio $portofolio)
    {
        if ($portofolio->foto) {
            Storage::disk('public')->delete($portofolio->foto);
        }
        $portofolio->delete();

        return redirect()->route('portofolio.index')->with('success', 'CV berhasil dihapus');
    }
}
