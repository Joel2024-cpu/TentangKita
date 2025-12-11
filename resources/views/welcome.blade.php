<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Archive | Safira & Jul</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500&family=Montserrat:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                        serif: ['Cormorant Garamond', 'serif'],
                    },
                    colors: {
                        'primary': '#2A2A2A',
                        'secondary': '#6C6C6C',
                        'gold': '#C5A059',          // Emas Mewah
                        'sage': '#A3B18A',          // Hijau Daun Lembut
                        'cream': '#F8F6F0',         // Warna Bunga/Kertas Terang
                        'paper': '#FFFCF5',         // Background Website Warm
                    },
                    animation: {
                        'gate-open-left': 'slideLeft 2.5s cubic-bezier(0.77, 0, 0.175, 1) forwards 0.5s',
                        'gate-open-right': 'slideRight 2.5s cubic-bezier(0.77, 0, 0.175, 1) forwards 0.5s',
                        'fade-out-logo': 'fadeOut 0.5s ease-out forwards 0.5s',
                        'bloom-up': 'bloomUp 1.5s ease-out forwards 2s', // Muncul setelah tirai buka
                        'float-soft': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s infinite',
                    },
                    keyframes: {
                        slideLeft: {
                            '0%': { transform: 'translateX(0)' },
                            '100%': { transform: 'translateX(-100%)' }
                        },
                        slideRight: {
                            '0%': { transform: 'translateX(0)' },
                            '100%': { transform: 'translateX(100%)' }
                        },
                        fadeOut: {
                            '0%': { opacity: '1', transform: 'scale(1)' },
                            '100%': { opacity: '0', transform: 'scale(0.9)' }
                        },
                        bloomUp: {
                            '0%': { opacity: '0', transform: 'translateY(40px) scale(0.95)' },
                            '100%': { opacity: '1', transform: 'translateY(0) scale(1)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-8px)' }
                        }
                    }
                }
            }
        }
    </script>

    <style>
        .hide-scroll::-webkit-scrollbar { display: none; }
        .hide-scroll { -ms-overflow-style: none; scrollbar-width: none; }

        /* --- KONTAINER UTAMA --- */
        .lush-arch-wrapper {
            position: relative;
            width: 100%;
            max-width: 600px;
            height: 75vh;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            /* Tidak ada border garis simple lagi */
        }

        /* --- CSS UNTUK RANGKAIAN BUNGA RIMBUN (LUSH FLORAL) --- */
        /* Ini membuat efek tumpukan bunga yang mewah menggunakan icon */
        .floral-cluster {
            position: absolute;
            pointer-events: none;
            z-index: 20;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.05));
        }

        .flora { position: absolute; }

        /* Posisi Cluster Bunga */
        .cluster-top-center { top: -40px; left: 50%; transform: translateX(-50%); }
        .cluster-top-left { top: 0; left: -20px; transform: rotate(-20deg); }
        .cluster-top-right { top: 0; right: -20px; transform: rotate(20deg) scaleX(-1); }
        .cluster-mid-left { top: 35%; left: -30px; transform: rotate(-10deg); }
        .cluster-mid-right { top: 35%; right: -30px; transform: rotate(10deg) scaleX(-1); }

    </style>
</head>
<body class="bg-paper text-primary antialiased selection:bg-gold/20 selection:text-primary overflow-x-hidden">

    <div class="fixed inset-0 z-[100] flex pointer-events-none">

        <div class="w-1/2 h-full bg-[#F8F6F0] flex items-center justify-end pr-4 animate-gate-open-left relative border-r border-gold/20">
             <div class="absolute right-4 top-0 bottom-0 w-px bg-gold/30"></div>
             <div class="absolute right-8 top-0 bottom-0 w-px bg-gold/10"></div>
        </div>

        <div class="w-1/2 h-full bg-[#F8F6F0] flex items-center justify-start pl-4 animate-gate-open-right relative border-l border-gold/20">
             <div class="absolute left-4 top-0 bottom-0 w-px bg-gold/30"></div>
             <div class="absolute left-8 top-0 bottom-0 w-px bg-gold/10"></div>
        </div>

        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[101] animate-fade-out-logo text-center">
            <div class="w-24 h-24 rounded-full flex items-center justify-center bg-[#F8F6F0] shadow-xl border border-gold/30">
                <span class="font-serif italic text-3xl text-gold animate-pulse-slow">J & S</span>
            </div>
        </div>
    </div>


    <nav class="fixed w-full z-50 top-0 py-4 px-6 md:px-12 flex justify-between items-center bg-paper/80 backdrop-blur-md border-b border-primary/5 transition-all">
        <a href="{{ route('home') }}" class="text-2xl md:text-3xl font-serif italic font-bold tracking-tight text-primary hover:text-gold transition-colors">J & S</a>
        <div class="flex items-center gap-6">
            <a href="{{ route('letters.index') }}" class="hidden md:block text-[10px] font-bold uppercase tracking-[0.2em] text-secondary hover:text-primary transition-colors">Letters</a>
            <a href="{{ route('story.create') }}" class="text-[10px] font-bold uppercase tracking-[0.2em] border border-primary/20 px-6 py-2 rounded-full hover:bg-primary hover:text-white transition-all duration-300">Add Moment</a>
        </div>
    </nav>


    <header class="relative min-h-screen flex flex-col items-center justify-end pb-0 pt-24 overflow-hidden">

        <div class="w-full px-4 opacity-0 animate-bloom-up">

            <div class="lush-arch-wrapper">

                <div class="floral-cluster cluster-top-center">
                    <div class="relative w-40 h-20 flex justify-center">
                        <i class="fa-solid fa-leaf text-5xl text-sage flora top-2 left-0 rotate-[-30deg] opacity-60"></i>
                        <i class="fa-solid fa-leaf text-5xl text-sage flora top-2 right-0 rotate-[30deg] scale-x-[-1] opacity-60"></i>
                        <i class="fa-brands fa-pagelines text-6xl text-gold flora -top-4"></i>
                        <i class="fa-solid fa-fan text-4xl text-cream flora top-4 left-8 rotate-[-15deg] text-shadow-sm"></i>
                        <i class="fa-solid fa-fan text-4xl text-cream flora top-4 right-8 rotate-[15deg] scale-x-[-1] text-shadow-sm"></i>
                        <i class="fa-solid fa-seedling text-3xl text-gold flora top-0"></i>
                    </div>
                </div>

                <div class="floral-cluster cluster-top-left">
                    <div class="relative w-32 h-32">
                         <i class="fa-solid fa-leaf text-4xl text-sage flora top-10 left-0 opacity-70"></i>
                         <i class="fa-brands fa-pagelines text-5xl text-gold flora top-0 left-5"></i>
                         <i class="fa-solid fa-spa text-3xl text-cream flora top-8 left-8"></i>
                    </div>
                </div>

                <div class="floral-cluster cluster-top-right">
                    <div class="relative w-32 h-32">
                         <i class="fa-solid fa-leaf text-4xl text-sage flora top-10 right-0 opacity-70 scale-x-[-1]"></i>
                         <i class="fa-brands fa-pagelines text-5xl text-gold flora top-0 right-5 scale-x-[-1]"></i>
                         <i class="fa-solid fa-spa text-3xl text-cream flora top-8 right-8 scale-x-[-1]"></i>
                    </div>
                </div>

                <div class="floral-cluster cluster-mid-left opacity-80">
                     <i class="fa-brands fa-pagelines text-4xl text-gold flora"></i>
                     <i class="fa-solid fa-leaf text-2xl text-sage flora top-6 left-4"></i>
                </div>

                <div class="floral-cluster cluster-mid-right opacity-80">
                     <i class="fa-brands fa-pagelines text-4xl text-gold flora scale-x-[-1]"></i>
                     <i class="fa-solid fa-leaf text-2xl text-sage flora top-6 right-4 scale-x-[-1]"></i>
                </div>


                <div class="text-center z-30 px-4 mt-12">

                    <p class="text-[10px] font-bold uppercase tracking-[0.4em] text-secondary mb-6">
                        The Archive of
                    </p>

                    <h1 class="mb-4">
                        <span class="block text-[4rem] md:text-8xl font-serif font-light leading-[0.9] text-primary">Jul</span>
                        <span class="block text-5xl font-serif italic text-gold my-1 animate-float-soft">&</span>
                        <span class="block text-[4rem] md:text-8xl font-serif font-light leading-[0.9] text-primary">Safira</span>
                    </h1>

                    <div class="w-12 h-px bg-gold/50 mx-auto my-6"></div>

                    <p class="text-xs md:text-sm font-sans font-light text-secondary max-w-xs mx-auto leading-relaxed">
                        "Merekam jejak waktu, menyimpan tawa, dan merayakan cinta kita."
                    </p>

                    <div class="mt-8">
                        <div class="inline-block border border-gold/20 rounded-full px-8 py-2 bg-white/60 backdrop-blur-sm shadow-sm">
                            <span class="font-serif text-2xl text-primary">{{ $daysTogether ?? '∞' }}</span>
                            <span class="text-[9px] uppercase tracking-widest text-secondary ml-2">Days</span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="max-w-[500px] h-px bg-gradient-to-r from-transparent via-gold/30 to-transparent mx-auto relative z-0 mt-4"></div>

        </div>

        <div class="absolute bottom-8 animate-bounce opacity-0 animate-bloom-up" style="animation-delay: 2.5s;">
            <div class="flex flex-col items-center gap-2">
                <span class="text-[8px] uppercase tracking-widest text-secondary">Scroll</span>
                <i class="fa-solid fa-chevron-down text-xs text-gold"></i>
            </div>
        </div>

    </header>


    <main class="relative z-10 max-w-[1100px] mx-auto px-6 md:px-12 pb-32 pt-24">

        <div class="sticky top-[80px] z-40 mb-16 opacity-0 animate-bloom-up" style="animation-delay: 2.2s;">
            <div class="bg-white/90 backdrop-blur-xl border border-primary/5 rounded-full shadow-[0_4px_20px_-5px_rgba(0,0,0,0.05)] px-6 py-4 flex justify-between items-center max-w-xl mx-auto transition-all hover:shadow-lg">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kenangan..."
                    class="bg-transparent border-none text-sm w-full outline-none text-center font-serif italic text-primary placeholder:text-secondary/40">
                <i class="fa-solid fa-search text-gold/80"></i>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($stories as $story)
            <div class="group relative opacity-0 animate-bloom-up" style="animation-delay: {{ 2.4 + ($loop->index * 0.1) }}s">

                <div class="bg-white p-4 pb-6 rounded-lg shadow-[0_2px_15px_-5px_rgba(0,0,0,0.05)] hover:shadow-[0_20px_40px_-10px_rgba(197,160,89,0.15)] hover:-translate-y-2 transition-all duration-500 ease-out cursor-pointer h-full border border-primary/5">

                    <div class="relative overflow-hidden bg-gray-50 mb-5 aspect-video rounded-md">
                        @if($story->image)
                            <img src="{{ asset('storage/' . $story->image) }}"
                                 class="w-full h-full object-cover transition duration-[1500ms] ease-in-out transform group-hover:scale-105"
                                 alt="{{ $story->title }}"
                                 loading="lazy">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-primary/10"><i class="fa-regular fa-image text-3xl"></i></div>
                        @endif

                        <div class="absolute top-3 left-3 bg-white/95 backdrop-blur px-3 py-1.5 shadow-sm border border-primary/5 rounded text-center">
                            <span class="block text-xs font-bold text-primary">{{ \Carbon\Carbon::parse($story->date)->format('d') }}</span>
                            <span class="block text-[8px] uppercase text-gold tracking-wider">{{ \Carbon\Carbon::parse($story->date)->format('M') }}</span>
                        </div>
                    </div>

                    <div class="text-center px-2">
                        <h3 class="text-lg font-serif font-medium text-primary mb-2 line-clamp-1 group-hover:text-gold transition-colors">{{ $story->title }}</h3>
                        <div class="w-6 h-px bg-primary/10 mx-auto mb-3 group-hover:w-12 group-hover:bg-gold transition-all duration-500"></div>
                        <p class="text-xs font-sans text-secondary/80 leading-relaxed line-clamp-2">{{ $story->content }}</p>
                    </div>

                    <div class="absolute top-3 right-3 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-x-2 group-hover:translate-x-0">
                        <a href="{{ route('story.edit', $story->id) }}" class="w-8 h-8 flex items-center justify-center bg-white text-primary rounded-full shadow hover:bg-gold hover:text-white transition-colors text-xs border border-primary/10"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('story.destroy', $story->id) }}" method="POST" onsubmit="return confirm('Hapus?');">@csrf @method('DELETE')<button class="w-8 h-8 flex items-center justify-center bg-white text-primary rounded-full shadow hover:bg-red-500 hover:text-white transition-colors text-xs border border-primary/10"><i class="fa-solid fa-trash"></i></button></form>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

        @if($stories->isEmpty())
        <div class="flex flex-col items-center justify-center py-32 opacity-50 animate-bloom-up" style="animation-delay: 2.8s;">
            <p class="font-serif italic text-xl text-primary">Jurnal masih kosong.</p>
        </div>
        @endif

    </main>

    <footer class="py-12 border-t border-primary/5 text-center bg-paper relative z-10">
        <p class="text-[9px] font-bold uppercase tracking-[0.3em] text-primary/40">The Archive • {{ date('Y') }}</p>
    </footer>

</body>
</html>
