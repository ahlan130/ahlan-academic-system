<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'jurusan' => 'required',
            'email' => 'required|email|unique:mahasiswas',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa berhasil ditambahkan.');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $mataKuliahs = \App\Models\MataKuliah::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'mataKuliahs'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required',
            'jurusan' => 'required',
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
        ]);

        $mahasiswa->update($request->all());

        if ($request->has('mata_kuliah')) {
            $mahasiswa->mataKuliahs()->sync($request->mata_kuliah);
        } else {
            $mahasiswa->mataKuliahs()->detach();
        }

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa berhasil diupdate.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa berhasil dihapus.');
    }
}
