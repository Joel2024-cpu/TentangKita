<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Cerita Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Playfair+Display:ital,wght@0,400;0,600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1 { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 py-12 px-6">

    <div class="max-w-2xl mx-auto bg-white p-8 md:p-12 rounded-xl shadow-sm border border-gray-100">

        <div class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-serif text-gray-900">New Entry</h1>
            <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-gray-900 underline decoration-1 underline-offset-4">&larr; Kembali ke Jurnal</a>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 text-red-600 p-4 rounded-lg text-sm mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('story.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Judul Momen</label>
                <input type="text" name="title" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:border-gray-500 focus:bg-white focus:ring-0 transition duration-200" placeholder="Misal: Dinner Anniversary ke-1">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Kejadian</label>
                <input type="date" name="story_date" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:border-gray-500 focus:bg-white focus:ring-0 transition duration-200">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Cerita Singkat</label>
                <textarea name="content" rows="4" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:border-gray-500 focus:bg-white focus:ring-0 transition duration-200" placeholder="Tulis kenangan di sini..."></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Foto (Opsional)</label>
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-2 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="text-sm text-gray-500"><span class="font-medium">Klik untuk upload</span> (Max 2MB)</p>
                        </div>
                        <input id="dropzone-file" type="file" name="image" class="hidden" accept="image/*" />
                    </label>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-300">
                    Simpan ke Jurnal
                </button>
            </div>

        </form>
    </div>

</body>
</html>
