<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\LetterController;

// --- Halaman Utama ---
Route::get('/', function (Request $request) {
    // 1. Mulai Query
    $query = Story::query();

    // 2. Logika Pencarian (Search)
    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('content', 'like', "%{$search}%");
        });
    }

    // 3. Logika Filter Tahun
    if ($request->has('year') && $request->year != '') {
        $query->whereYear('story_date', $request->year);
    }

    // 4. Ambil Data (Urutkan dari terbaru)
    $stories = $query->orderBy('story_date', 'desc')->get();

    // 5. PERBAIKAN: Ambil Tahun (Cara Universal / SQLite Support)
    // Kita ambil semua tanggal dulu, baru diolah menjadi tahun menggunakan PHP/Laravel
    $availableYears = Story::pluck('story_date')
        ->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        })
        ->unique()     // Hapus tahun yang kembar
        ->sortDesc();  // Urutkan dari tahun terbaru

    // 6. Hitung Hari Jadian (28 September 2023)
    $startDate = \Carbon\Carbon::parse('2023-09-28');
    $daysTogether = floor($startDate->diffInDays(now()));

    // 7. Kirim data ke tampilan
    return view('welcome', compact('stories', 'daysTogether', 'availableYears'));
})->name('home');


// --- Grup Route Story ---
Route::controller(StoryController::class)->group(function () {
    Route::get('/story/create', 'create')->name('story.create');
    Route::post('/story', 'store')->name('story.store');
    Route::get('/story/{id}/edit', 'edit')->name('story.edit');
    Route::put('/story/{id}', 'update')->name('story.update');
    Route::delete('/story/{id}', 'destroy')->name('story.destroy');
});


// --- Grup Route Surat (Open When) ---
Route::controller(LetterController::class)->group(function () {
    Route::get('/letters', 'index')->name('letters.index');
    Route::get('/letters/write', 'create')->name('letters.create');
    Route::post('/letters', 'store')->name('letters.store');
    Route::get('/letters/{id}/edit', 'edit')->name('letters.edit');
    Route::put('/letters/{id}', 'update')->name('letters.update');
    Route::delete('/letters/{id}', 'destroy')->name('letters.destroy');
});
