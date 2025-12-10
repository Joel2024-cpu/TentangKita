<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Journal of S & J</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,400;1,500&family=Montserrat:wght@200;300;400;500&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                        serif: ['Cormorant Garamond', 'serif'],
                    },
                    colors: {
                        'primary': '#2C2C2C',    // Hitam Charcoal (Lebih lembut dari hitam murni)
                        'secondary': '#6D6D6D',  // Abu-abu elegan
                        'accent': '#C0A080',     // Muted Gold / Earthy
                        'paper': '#F9F8F4',      // Warna Kertas Premium
                        'surface': '#FFFFFF',
                    },
                    backgroundImage: {
                        'grain': "url('data:image/svg+xml,%3Csvg viewBox=%220 0 200 200%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cfilter id=%22noiseFilter%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.65%22 numOctaves=%223%22 stitchTiles=%22stitch%22/%3E%3C/filter%3E%3Crect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23noiseFilter)%22 opacity=%220.05%22/%3E%3C/svg%3E')",
                    }
                }
            }
        }
    </script>
    <style>
        /* Menghilangkan Scrollbar default agar bersih */
        ::-webkit-scrollbar { width: 0px; background: transparent; }
        .hide-scroll::-webkit-scrollbar { display: none; }
        .text-vertical { writing-mode: vertical-rl; }
    </style>
</head>
<body class="bg-paper text-primary antialiased selection:bg-accent/20">

    <div class="fixed inset-0 bg-grain opacity-60 pointer-events-none z-0"></div>

    <nav class="fixed w-full z-50 top-0 py-6 px-8 flex justify-between items-center bg-paper/80 backdrop-blur-md border-b border-primary/5 transition-all">
        <a href="{{ route('home') }}" class="text-2xl font-serif italic font-bold tracking-tight text-primary">S & J</a>

        <div class="flex items-center gap-4 md:gap-8">
            <a href="{{ route('letters.index') }}" class="text-[10px] md:text-xs font-medium uppercase tracking-[0.2em] hover:text-accent transition-colors">
                Letters
            </a>
            <a href="{{ route('story.create') }}" class="text-[10px] md:text-xs font-medium uppercase tracking-[0.2em] border border-primary/20 px-5 py-2 rounded-full hover:bg-primary hover:text-white transition-all">
                Add Moment
            </a>
        </div>
    </nav>

    <header class="relative min-h-screen flex flex-col items-center justify-center px-6 pt-20 overflow-hidden">

        <div class="absolute left-8 top-0 bottom-0 w-px bg-primary/5 hidden md:block"></div>
        <div class="absolute right-8 top-0 bottom-0 w-px bg-primary/5 hidden md:block"></div>

        <div class="relative z-10 text-center max-w-4xl space-y-8 animate-fade-in-up">
            <div class="flex items-center justify-center gap-4">
                <div class="h-px w-12 bg-accent"></div>
                <span class="text-xs uppercase tracking-[0.4em] text-secondary">The Archive</span>
                <div class="h-px w-12 bg-accent"></div>
            </div>

            <h1 class="text-6xl md:text-9xl font-serif font-light leading-[0.9] tracking-tight text-primary">
                Safira <span class="font-serif italic text-accent">&</span> Jul
            </h1>

            <p class="text-sm md:text-base font-sans font-light text-secondary max-w-lg mx-auto leading-relaxed tracking-wide">
                Sebuah koleksi visual perjalanan waktu, merekam setiap tawa, tangis, dan pertumbuhan kita bersama.
            </p>

            <div class="pt-8">
                <div class="inline-block border border-primary/10 px-8 py-4 bg-white/50 backdrop-blur-sm">
                    <span class="block text-4xl md:text-5xl font-serif text-primary">{{ $daysTogether }}</span>
                    <span class="block text-[9px] uppercase tracking-[0.3em] text-secondary mt-1">Days Together</span>
                </div>
            </div>
        </div>

        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-50 animate-bounce">
            <span class="text-[9px] uppercase tracking-widest text-vertical h-12">Scroll</span>
            <div class="w-px h-12 bg-primary"></div>
        </div>
    </header>

    <main class="relative z-10 max-w-7xl mx-auto px-6 pb-32">

        <div class="sticky top-20 z-40 mb-16 py-4 bg-paper/95 backdrop-blur-sm border-b border-primary/5">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <form action="{{ route('home') }}" method="GET" class="w-full md:w-auto flex-1 max-w-sm">
                    <div class="relative group">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search memories..."
                            class="w-full bg-transparent border-b border-primary/20 py-2 pr-8 text-lg font-serif italic text-primary focus:outline-none focus:border-accent transition-colors placeholder:text-primary/30">
                        <span class="absolute right-0 top-3 text-primary/30 group-focus-within:text-accent">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </span>
                    </div>
                </form>

                <form action="{{ route('home') }}" method="GET">
                    <div class="flex gap-2 overflow-x-auto hide-scroll pb-1">
                        <button type="submit" name="year" value="" class="px-4 py-1 text-[10px] uppercase tracking-widest border border-primary/10 rounded-full hover:bg-primary hover:text-white transition-all {{ request('year') == '' ? 'bg-primary text-white' : 'text-secondary' }}">
                            All
                        </button>
                        @foreach($availableYears as $year)
                            <button type="submit" name="year" value="{{ $year }}" class="px-4 py-1 text-[10px] uppercase tracking-widest border border-primary/10 rounded-full hover:bg-primary hover:text-white transition-all {{ request('year') == $year ? 'bg-primary text-white' : 'text-secondary' }}">
                                {{ $year }}
                            </button>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>

        <div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8">
            @foreach($stories as $story)
            <div class="group break-inside-avoid relative mb-8">

                <div class="relative bg-white p-4 shadow-[0_5px_30px_-15px_rgba(0,0,0,0.05)] hover:shadow-[0_20px_40px_-15px_rgba(0,0,0,0.1)] transition-all duration-700 ease-out">

                    <div class="relative overflow-hidden bg-primary/5 aspect-[4/5] mb-6">
                        @if($story->image)
                            <img src="{{ asset('storage/' . $story->image) }}" class="w-full h-full object-cover transition duration-1000 group-hover:scale-105 filter grayscale-[20%] group-hover:grayscale-0" alt="Moment">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="font-serif italic text-3xl text-primary/20">S & J</span>
                            </div>
                        @endif

                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1">
                            <span class="text-[9px] uppercase tracking-widest font-medium text-primary">
                                {{ \Carbon\Carbon::parse($story->story_date)->format('d M Y') }}
                            </span>
                        </div>

                        <div class="absolute top-4 right-4 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-x-4 group-hover:translate-x-0">
                            <a href="{{ route('story.edit', $story->id) }}" class="w-8 h-8 flex items-center justify-center bg-white text-primary hover:bg-accent hover:text-white rounded-full shadow-sm transition-colors">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </a>
                            <form action="{{ route('story.destroy', $story->id) }}" method="POST" onsubmit="return confirm('Hapus momen ini?');">
                                @csrf @method('DELETE')
                                <button class="w-8 h-8 flex items-center justify-center bg-white text-primary hover:bg-red-500 hover:text-white rounded-full shadow-sm transition-colors">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="text-center px-4 pb-2">
                        <h3 class="text-2xl font-serif font-medium text-primary mb-3 leading-tight">{{ $story->title }}</h3>
                        <div class="w-8 h-px bg-accent/30 mx-auto mb-4"></div>
                        <p class="text-sm font-sans font-light text-secondary leading-relaxed">
                            {{ $story->content }}
                        </p>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

        @if($stories->isEmpty())
        <div class="text-center py-20 opacity-50">
            <p class="font-serif italic text-2xl">Belum ada cerita yang ditulis.</p>
        </div>
        @endif

    </main>

    <footer class="py-12 border-t border-primary/5 text-center relative z-10">
        <p class="text-[10px] uppercase tracking-[0.3em] text-primary/40 hover:text-accent transition-colors">Safira & Jul Journal • Est. 2023</p>
    </footer>

</body>
</html>
