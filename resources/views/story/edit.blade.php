<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Entry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Playfair+Display:ital,wght@0,400;0,600&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } h1 { font-family: 'Playfair Display', serif; } </style>
</head>
<body class="bg-white text-gray-800 py-12 px-6">
    <div class="max-w-xl mx-auto">
        <div class="flex justify-between items-center mb-12">
            <h1 class="text-3xl font-serif text-gray-900 italic">Edit Memory</h1>
            <a href="{{ route('home') }}" class="text-xs uppercase tracking-widest text-gray-400 hover:text-gray-900 border-b border-transparent hover:border-gray-900 transition-all pb-1">Cancel</a>
        </div>

        <form action="{{ route('story.update', $story->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT') <div class="relative z-0 w-full group">
                <input type="text" name="title" value="{{ old('title', $story->title) }}" required class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-black peer" placeholder=" " />
                <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Moment Title</label>
            </div>

            <div class="relative z-0 w-full group">
                <input type="date" name="story_date" value="{{ old('story_date', $story->story_date) }}" required class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-black peer" />
                <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date</label>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-widest text-gray-400 mb-2">The Story</label>
                <textarea name="content" rows="6" required class="block p-4 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-200 focus:ring-black focus:border-black" placeholder="Write something meaningful...">{{ old('content', $story->content) }}</textarea>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-widest text-gray-400 mb-4">Visual Memory</label>

                <div class="flex items-start gap-6">
                    @if($story->image)
                    <div class="shrink-0">
                        <p class="text-[10px] text-center mb-1 text-gray-400">Current</p>
                        <img src="{{ asset('storage/' . $story->image) }}" class="h-24 w-20 object-cover rounded shadow-sm grayscale hover:grayscale-0 transition">
                    </div>
                    @endif

                    <label class="flex-1 flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:bg-gray-50 transition">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <p class="text-xs text-gray-500"><span class="font-medium">Click to replace photo</span></p>
                        </div>
                        <input type="file" name="image" class="hidden" />
                    </label>
                </div>
            </div>

            <div class="pt-6">
                <button type="submit" class="w-full py-4 bg-black text-white text-xs font-bold uppercase tracking-[0.2em] hover:bg-gray-800 transition shadow-lg">
                    Update Journal
                </button>
            </div>
        </form>
    </div>
</body>
</html>
