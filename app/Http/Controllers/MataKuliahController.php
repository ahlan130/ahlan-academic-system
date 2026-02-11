<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliahs = MataKuliah::all();
        return view('matakuliah.index', compact('mataKuliahs'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:mata_kuliahs',
            'nama_mk' => 'required',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        MataKuliah::create($request->all());

        return redirect()->route('matakuliah.index')
            ->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    public function edit(MataKuliah $matakuliah)
    {
        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, MataKuliah $matakuliah)
    {
        $request->validate([
            'kode_mk' => 'required|unique:mata_kuliahs,kode_mk,' . $matakuliah->id,
            'nama_mk' => 'required',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        $matakuliah->update($request->all());

        return redirect()->route('matakuliah.index')
            ->with('success', 'Mata Kuliah berhasil diupdate.');
    }

    public function destroy(MataKuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')
            ->with('success', 'Mata Kuliah berhasil dihapus.');
    }
}
