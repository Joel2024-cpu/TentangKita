<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Letter</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&family=Playfair+Display:ital,wght@0,400;0,600&display=swap" rel="stylesheet">
    <style> .serif-font { font-family: 'Playfair Display', serif; } </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center py-12 px-6">

    <div class="bg-white p-8 md:p-12 w-full max-w-xl shadow-sm border border-gray-100">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl serif-font italic">Edit Letter</h1>
            <a href="{{ route('letters.index') }}" class="text-xs uppercase text-gray-400 hover:text-black">Cancel</a>
        </div>

        <form action="{{ route('letters.update', $letter->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT') <div>
                <label class="block text-xs uppercase tracking-widest text-gray-400 mb-2">Open When...</label>
                <input type="text" name="title" value="{{ old('title', $letter->title) }}" required
                    class="w-full text-lg border-b border-gray-300 py-2 focus:outline-none focus:border-black font-serif transition">
            </div>

            <div>
                <label class="block text-xs uppercase tracking-widest text-gray-400 mb-2">From</label>
                <select name="sender" class="w-full bg-transparent border-b border-gray-300 py-2 focus:outline-none focus:border-black cursor-pointer">
                    <option value="Jul" {{ $letter->sender == 'Jul' ? 'selected' : '' }}>Jul</option>
                    <option value="Safira" {{ $letter->sender == 'Safira' ? 'selected' : '' }}>Safira</option>
                </select>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-widest text-gray-400 mb-2">Message</label>
                <textarea name="content" rows="8" required
                    class="w-full bg-gray-50 p-4 text-sm leading-relaxed border border-gray-100 rounded focus:outline-none focus:border-gray-400 focus:bg-white transition">{{ old('content', $letter->content) }}</textarea>
            </div>

            <button type="submit" class="w-full bg-black text-white py-3 text-xs font-bold uppercase tracking-widest hover:bg-gray-800 transition mt-4">
                Update Letter
            </button>
        </form>
    </div>
</body>
</html>
