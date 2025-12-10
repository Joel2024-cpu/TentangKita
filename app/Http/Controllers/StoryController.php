<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use Illuminate\Support\Facades\Storage; // Penting untuk hapus gambar

class StoryController extends Controller
{
    // 1. Tampilkan Form Tambah
    public function create()
    {
        return view('story.create');
    }

    // 2. Simpan Data Baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'story_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('story-images', 'public');
        }

        Story::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'story_date' => $validated['story_date'],
            'image' => $imagePath,
        ]);

        return redirect()->route('home')->with('success', 'Cerita berhasil ditambahkan!');
    }

    // 3. Tampilkan Form Edit (BARU)
    public function edit($id)
    {
        $story = Story::findOrFail($id);
        return view('story.edit', compact('story'));
    }

    // 4. Update Data (BARU)
    public function update(Request $request, $id)
    {
        $story = Story::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'story_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cek jika user upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari folder
            if ($story->image) {
                Storage::disk('public')->delete($story->image);
            }
            // Simpan gambar baru
            $story->image = $request->file('image')->store('story-images', 'public');
        }

        // Update data teks
        $story->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'story_date' => $validated['story_date'],
            // image otomatis tersimpan di objek $story di atas jika ada perubahan
        ]);

        return redirect()->route('home')->with('success', 'Cerita berhasil diperbarui!');
    }

    // 5. Hapus Data (BARU)
    public function destroy($id)
    {
        $story = Story::findOrFail($id);

        // Hapus file fisik gambar
        if ($story->image) {
            Storage::disk('public')->delete($story->image);
        }

        $story->delete();

        return redirect()->route('home')->with('success', 'Cerita berhasil dihapus.');
    }
}
