<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open When Letters</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,400;1,500&family=Montserrat:wght@200;300;400;500&family=La+Belle+Aurore&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                        serif: ['Cormorant Garamond', 'serif'],
                        hand: ['La Belle Aurore', 'cursive'],
                    },
                    colors: {
                        'primary': '#2C2C2C',
                        'secondary': '#6D6D6D',
                        'accent': '#C0A080',
                        'paper': '#F9F8F4',
                        'seal': '#D4AF37', // Gold Seal
                    },
                    backgroundImage: {
                        'grain': "url('data:image/svg+xml,%3Csvg viewBox=%220 0 200 200%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cfilter id=%22noiseFilter%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.65%22 numOctaves=%223%22 stitchTiles=%22stitch%22/%3E%3C/filter%3E%3Crect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23noiseFilter)%22 opacity=%220.05%22/%3E%3C/svg%3E')",
                    },
                    boxShadow: {
                        'envelope': '0 2px 10px rgba(0,0,0,0.03), 0 15px 30px -10px rgba(0,0,0,0.08)',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-paper text-primary min-h-screen">

    <div class="fixed inset-0 bg-grain opacity-60 pointer-events-none z-0"></div>

    <nav class="fixed w-full z-40 top-0 py-8 px-8 flex justify-between items-center pointer-events-none">
        <a href="{{ route('home') }}" class="pointer-events-auto text-[10px] uppercase tracking-[0.2em] text-secondary hover:text-primary transition-colors flex items-center gap-2">
            <span>&larr;</span> Back
        </a>
        <a href="{{ route('letters.create') }}" class="pointer-events-auto bg-primary text-white text-[10px] uppercase tracking-[0.2em] px-6 py-3 rounded-sm shadow-lg hover:bg-accent transition-all">
            Write Letter
        </a>
    </nav>

    <header class="relative z-10 pt-32 pb-20 px-6 text-center max-w-2xl mx-auto">
        <h1 class="text-5xl md:text-7xl font-serif font-light italic text-primary mb-6">Open When...</h1>
        <p class="text-secondary font-light text-sm md:text-base leading-relaxed">
            Kumpulan pesan untuk masa depan. Bukalah surat ini hanya ketika momennya tiba.
        </p>
    </header>

    <main class="relative z-10 max-w-6xl mx-auto px-6 pb-32">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($letters as $letter)
            <div class="group relative cursor-pointer perspective-1000" onclick="openLetter('{{ $letter->title }}', '{{ $letter->sender }}', `{{ $letter->content }}`)">

                <div class="absolute inset-0 bg-white border border-primary/5 shadow-sm transform translate-x-2 translate-y-2 z-0 transition-transform duration-300 group-hover:translate-x-3 group-hover:translate-y-3"></div>

                <div class="relative z-10 bg-[#FFFEFC] aspect-[1.5/1] border border-primary/10 shadow-envelope flex flex-col items-center justify-center p-8 transition-transform duration-500 group-hover:-translate-y-1">

                    <div class="absolute inset-0 border-[12px] border-transparent border-t-white/50 border-r-white/50 pointer-events-none mix-blend-multiply"></div>

                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#D4AF37] to-[#AA8C2C] shadow-md flex items-center justify-center text-white mb-6 transform group-hover:scale-110 transition-transform">
                        <span class="font-serif italic text-lg font-bold">SJ</span>
                    </div>

                    <p class="text-[9px] uppercase tracking-[0.3em] text-secondary/60 mb-2">To: {{ $letter->sender == 'Jul' ? 'Safira' : 'Jul' }}</p>

                    <h3 class="text-2xl font-serif text-primary text-center leading-tight group-hover:text-accent transition-colors">
                        {{ $letter->title }}
                    </h3>

                    <div class="absolute bottom-4 right-4 flex gap-3 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0" onclick="event.stopPropagation();">
                        <a href="{{ route('letters.edit', $letter->id) }}" class="text-[10px] uppercase tracking-widest text-secondary hover:text-accent border-b border-transparent hover:border-accent">Edit</a>
                        <form action="{{ route('letters.destroy', $letter->id) }}" method="POST" onsubmit="return confirm('Bakar surat ini?');" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-[10px] uppercase tracking-widest text-secondary hover:text-red-400 border-b border-transparent hover:border-red-400">Burn</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

            <a href="{{ route('letters.create') }}" class="group relative aspect-[1.5/1] border border-dashed border-primary/20 flex flex-col items-center justify-center hover:bg-white/50 transition-colors">
                <span class="text-4xl font-serif text-primary/20 group-hover:text-accent transition-colors mb-2">+</span>
                <span class="text-[10px] uppercase tracking-widest text-primary/40 group-hover:text-accent">New Letter</span>
            </a>
        </div>
    </main>

    <div id="letterModal" class="fixed inset-0 z-50 hidden transition-opacity duration-500 opacity-0" aria-hidden="true">
        <div class="absolute inset-0 bg-[#2C2C2C]/40 backdrop-blur-sm" onclick="closeLetter()"></div>

        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div id="modalContent" class="relative bg-[#FFFEFC] w-full max-w-2xl max-h-[85vh] shadow-2xl transform scale-95 transition-transform duration-500 flex flex-col">

                <div class="absolute top-0 left-0 w-full h-1 bg-accent/50"></div>

                <div class="p-10 pb-0 flex justify-between items-start">
                    <div>
                        <span class="text-[9px] uppercase tracking-[0.3em] text-secondary">Subject</span>
                        <h2 id="modalTitle" class="text-3xl md:text-4xl font-serif italic text-primary mt-2">Title</h2>
                    </div>
                    <button onclick="closeLetter()" class="text-secondary hover:text-primary transition-colors text-xl">&times;</button>
                </div>

                <div class="flex-1 overflow-y-auto p-10 prose prose-p:font-serif prose-p:text-lg prose-p:leading-loose prose-p:text-primary/90">
                    <p id="modalBody" class="whitespace-pre-line"></p>
                </div>

                <div class="p-10 pt-0 text-right">
                    <span class="text-[9px] uppercase tracking-[0.3em] text-secondary block mb-2">With Love,</span>
                    <span id="modalSender" class="font-hand text-4xl text-accent transform -rotate-2 inline-block">Sender</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('letterModal');
        const modalContent = document.getElementById('modalContent');

        function openLetter(title, sender, content) {
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalSender').innerText = sender;
            document.getElementById('modalBody').innerText = content;

            modal.classList.remove('hidden');
            // Force reflow
            void modal.offsetWidth;

            modal.classList.remove('opacity-0');
            modalContent.classList.remove('scale-95');
            modalContent.classList.add('scale-100');
        }

        function closeLetter() {
            modal.classList.add('opacity-0');
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-95');

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 500);
        }
    </script>
</body>
</html>
