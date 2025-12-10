<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoveLetter;

class LetterController extends Controller
{
    // 1. TAMPILKAN SEMUA SURAT
    public function index()
    {
        $letters = LoveLetter::latest()->get();
        return view('letters.index', compact('letters'));
    }

    // 2. HALAMAN TULIS SURAT BARU
    public function create()
    {
        return view('letters.create');
    }

    // 3. SIMPAN SURAT BARU
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'content' => 'required',
            'sender' => 'required',
        ]);

        LoveLetter::create($request->all());

        return redirect()->route('letters.index')->with('success', 'Surat berhasil disegel.');
    }

    // 4. HALAMAN EDIT SURAT
    public function edit($id)
    {
        $letter = LoveLetter::findOrFail($id);
        return view('letters.edit', compact('letter'));
    }

    // 5. UPDATE SURAT (SIMPAN PERUBAHAN)
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'content' => 'required',
            'sender' => 'required',
        ]);

        $letter = LoveLetter::findOrFail($id);
        $letter->update($request->all());

        return redirect()->route('letters.index')->with('success', 'Isi surat berhasil diperbarui.');
    }

    // 6. HAPUS SURAT
    public function destroy($id)
    {
        LoveLetter::destroy($id);
        return back()->with('success', 'Surat telah dihapus.');
    }
}
