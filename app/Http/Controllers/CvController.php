<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;

class CvController extends Controller
{
    private function rules()
    {
        return [
            'nama'       => 'required|string|max:100',
            'email'      => 'required|email|max:100',
            'telepon'    => 'required|string|max:20',
            'alamat'     => 'nullable|string|max:255',
            'tentang'    => 'nullable|string',
            'pendidikan' => 'nullable|string',
            'pengalaman' => 'nullable|string',
            'skill'      => 'nullable|string',
        ];
    }

    public function index()
    {
        $cvs = Cv::latest()->get();
        return view('admin.cv.index', compact('cvs'));
    }

    public function create()
    {
        return view('admin.cv.create');
    }

    public function store(Request $request)
    {
        Cv::create($request->validate($this->rules()));
        return redirect()->route('cv.index')->with('success', 'Data CV berhasil ditambahkan');
    }

    public function show(Cv $cv)
    {
        return view('admin.cv.show', compact('cv'));
    }

    public function edit(Cv $cv)
    {
        return view('admin.cv.edit', compact('cv'));
    }

    public function update(Request $request, Cv $cv)
    {
        $cv->update($request->validate($this->rules()));
        return redirect()->route('cv.index')->with('success', 'Data CV berhasil diubah');
    }

    public function destroy(Cv $cv)
    {
        $cv->delete();
        return redirect()->route('cv.index')->with('success', 'Data CV berhasil dihapus');
    }
}
