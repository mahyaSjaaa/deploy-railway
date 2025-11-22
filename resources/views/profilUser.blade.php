<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite('resources/css/app.css')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <style>
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="antialiased min-h-screen bg-gradient-to-b from-[#1C1C1C] from-35% to-[#ED1B24]">
        <div class="mx-6">
            <!--------------------------------------UPPERNAV------------------------------------------------------->
            <div class="flex justify-between px-6 items-center py-3 border-b-2 border-b-[#47454A]">
                <p class="font-poppins italic font-semibold text-[28px] text-white">AutoRent</p>
                <div class="flex gap-6">
                    <form action="/main" method="GET">
                        <button type="submit" class="font-poppins text-white hover:text-[#ED1B24] transition duration-300 ease-in-out">Beranda</button>
                    </form>
                    <form action="/sewa-saya/{{Auth::user()->id}}" method="GET">
                        @csrf
                        <button type="submit" class="font-poppins text-white hover:text-[#ED1B24] transition duration-300 ease-in-out">Sewa saya</button>
                    </form>
                    <form action="/profilUser" method="GET">
                        <button type="submit" class="font-poppins text-[#ED1B24]"">Profil</button>
                    </form>
                </div>
            </div>
            <!--------------------------------------HEADER------------------------------------------------------->
            <div class="flex justify-center">
                <div class="bg-[#000000] mt-9 shadow-md w-[1120px] h-[200px] relative overflow-hidden">
                    <div class="absolute h-[200px] w-[1120px] z-50">
                        <p class="font-poppins absolute left-[480px] top-[60px] text-white">USERNAME</p>
                        <p class="font-poppins font-bold absolute left-[340px] text-[24px] top-[74px] text-white">{{Auth::user()->name}}</p>

                        <div class="absolute w-[150px] h-[1px] left-[350px] bottom-[38px] bg-white z-50"></div>
                        <div class="absolute w-[150px] h-[1px] left-[240px] bottom-[24px] bg-white z-50"></div>

                        <p class="font-poppins absolute left-[640px] top-[60px] text-white">No WA</p>
                        <p class="font-poppins font-bold absolute left-[640px] text-[24px] top-[74px] text-white">+{{Auth::user()->no_wa}}</p>

                        <div class="absolute w-[150px] h-[1px] left-[646px] bottom-[38px] bg-white z-50"></div>
                        <div class="absolute w-[150px] h-[1px] left-[525px] bottom-[24px] bg-white z-50"></div>

                        <p class="font-poppins absolute left-[935px] top-[60px] text-white">KOTA</p>
                        <p class="font-poppins font-bold absolute left-[940px] text-[24px] top-[74px] text-white">{{Auth::user()->KOTA}}</p>

                        <div class="absolute w-[150px] h-[1px] left-[950px] bottom-[38px] bg-white z-50"></div>
                        <div class="absolute w-[150px] h-[1px] left-[825px] bottom-[24px] bg-white z-50"></div>
                    </div>
                    <div class="absolute bg-[url('/public/img/2pp.png')] h-[200px] w-[400px] left-0 z-10"></div>
                    <div class="absolute bg-gradient-to-r from-[#ED1B24] to-black h-[200px] h-[200px] w-[480px] left-[200px] -rotate-45 z-20"></div>
                    <div class="absolute bg-gradient-to-r from-black to-[#ED1B24] h-[200px] h-[240px] w-[480px] left-[790px] -rotate-45 z-20"></div>
                </div>
            </div>

            <div class="flex justify-center mt-9">
                <div x-data="{ open: false }" class="relative">
                    <!-- Tombol Delete -->
                    <button 
                        @click="open = true"
                        class="text-white bg-gradient-to-r from-[#ED1B24] to-[#C41118] hover:from-[#C41118] hover:to-[#ED1B24] font-bold px-6 py-2 text-[12px] uppercase tracking-wider border-2 border-[#ED1B24] hover:border-[#FF2030] transition-all duration-200 flex items-center gap-2 w-[1120px] flex justify-center"
                    >
                        Edit Profil
                    </button>
    
                    <!-- Modal Overlay -->
                    <div 
                        x-show="open"
                        x-cloak
                        class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm flex items-center justify-center font-poppins"
                    >
                        <!-- Modal Box -->
                        <div 
                            @click.away="open = false"
                            class="bg-zinc-900 w-[450px] border border-zinc-800 shadow-2xl overflow-hidden"
                        >
                            <!-- Modal Header -->
                            <div class="flex justify-between items-center px-6 py-4 bg-black border-b-2 border-[#ED1B24]">
                                <h2 class="text-lg font-bold text-white uppercase tracking-wide flex items-center gap-3">
                                    <div class="bg-[#ED1B24] p-1.5">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    Edit Profil Anda
                                </h2>
                                <button 
                                    @click="open = false"
                                    class="w-8 h-8 flex items-center justify-center border-2 border-zinc-700 hover:bg-zinc-800 hover:border-[#ED1B24] transition-all text-zinc-400 hover:text-white font-bold text-xl"
                                >
                                    ×
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div class="p-6 max-h-[70vh] overflow-y-auto bg-gradient-to-b from-zinc-900 to-black">
                                <form action="/updateProfilUser" method="POST">
                                    @csrf
                                    
                                    <!-- Username -->
                                    <div class="mb-3">
                                        <label for="name" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Username</label>
                                        <input 
                                            type="text" 
                                            name="name" 
                                            id="name"
                                            value="{{Auth::user()->name}}"
                                            class="w-full px-4 py-2.5 bg-zinc-950 border-2 border-zinc-800 text-white text-sm focus:outline-none focus:border-[#ED1B24] transition-all placeholder:text-zinc-600"
                                            placeholder="Nama lengkap Anda"
                                        >
                                    </div>

                                    <!-- WhatsApp -->
                                    <div class="mb-3">
                                        <label for="no_wa" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">No. WhatsApp</label>
                                        <div class="flex items-center gap-2 bg-zinc-950 border-2 border-zinc-800 focus-within:border-[#ED1B24] transition-all">
                                            <div class="pl-4 flex items-center gap-2">
                                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                                </svg>
                                                <span class="text-zinc-500 text-sm">+62</span>
                                            </div>
                                            <input 
                                                type="text" 
                                                name="no_wa" 
                                                id="no_wa"
                                                value="{{Auth::user()->no_wa}}"
                                                class="flex-1 px-2 py-2.5 bg-transparent text-white text-sm focus:outline-none placeholder:text-zinc-600"
                                                placeholder="812xxxxxxxx"
                                            >
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-zinc-800 my-4"></div>
                                    <p class="text-[9px] text-zinc-500 uppercase tracking-widest font-bold mb-3">Alamat Lengkap</p>

                                    <!-- Grid 2 Kolom untuk Alamat -->
                                    <div class="grid grid-cols-2 gap-3">
                                        
                                        <!-- Desa -->
                                        <div class="mb-3">
                                            <label for="DESA" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Desa</label>
                                            <input 
                                                type="text" 
                                                name="DESA" 
                                                id="DESA"
                                                value="{{Auth::user()->DESA}}"
                                                class="w-full px-4 py-2.5 bg-zinc-950 border-2 border-zinc-800 text-white text-sm focus:outline-none focus:border-[#ED1B24] transition-all placeholder:text-zinc-600"
                                            >
                                        </div>

                                        <!-- Kecamatan -->
                                        <div class="mb-3">
                                            <label for="KECAMATAN" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Kecamatan</label>
                                            <input 
                                                type="text" 
                                                name="KECAMATAN" 
                                                id="KECAMATAN"
                                                value="{{Auth::user()->KECAMATAN}}"
                                                class="w-full px-4 py-2.5 bg-zinc-950 border-2 border-zinc-800 text-white text-sm focus:outline-none focus:border-[#ED1B24] transition-all placeholder:text-zinc-600"
                                            >
                                        </div>

                                        <!-- Kota -->
                                        <div class="mb-3">
                                            <label for="KOTA" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Kota</label>
                                            <input 
                                                type="text" 
                                                name="KOTA" 
                                                id="KOTA"
                                                value="{{Auth::user()->KOTA}}"
                                                class="w-full px-4 py-2.5 bg-zinc-950 border-2 border-zinc-800 text-white text-sm focus:outline-none focus:border-[#ED1B24] transition-all placeholder:text-zinc-600"
                                            >
                                        </div>

                                        <!-- Provinsi -->
                                        <div class="mb-3">
                                            <label for="PROVINSI" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Provinsi</label>
                                            <input 
                                                type="text" 
                                                name="PROVINSI" 
                                                id="PROVINSI"
                                                value="{{Auth::user()->PROVINSI}}"
                                                class="w-full px-4 py-2.5 bg-zinc-950 border-2 border-zinc-800 text-white text-sm focus:outline-none focus:border-[#ED1B24] transition-all placeholder:text-zinc-600"
                                            >
                                        </div>
                                    </div>

                                    <!-- Negara (Full Width) -->
                                    <div class="mb-4">
                                        <label for="NEGARA" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Negara</label>
                                        <input 
                                            type="text" 
                                            name="NEGARA" 
                                            id="NEGARA"
                                            value="{{Auth::user()->NEGARA}}"
                                            class="w-full px-4 py-2.5 bg-zinc-950 border-2 border-zinc-800 text-white text-sm focus:outline-none focus:border-[#ED1B24] transition-all placeholder:text-zinc-600"
                                        >
                                    </div>

                                    <!-- Submit Button -->
                                    <button 
                                        type="submit" 
                                        class="w-full bg-gradient-to-r from-[#ED1B24] to-[#C41118] hover:from-[#C41118] hover:to-[#ED1B24] text-white font-bold py-3.5 uppercase tracking-wider transition-all duration-200 border-t-2 border-[#FF2030] text-sm flex items-center justify-center gap-2 mt-2"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        SIMPAN PERUBAHAN
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--------------------------------------BODY------------------------------------------------------->
            <p class="text-white font-poppins text-[20px] font-semibold mt-9 mb-2 mx-6">INFO LENGKAP</p>
            <div class="text-white font-poppins mx-6">
                <div class="border-b-2 border-b-[#47454A] flex justify-between py-4 px-2">
                    <p>email</p>
                    <p>{{Auth::user()->email}}</p>
                </div>
                <div class="border-b-2 border-b-[#47454A] flex justify-between py-4 px-2">
                    <p>Desa</p>
                    <p>{{Auth::user()->DESA}}</p>
                </div>
                <div class="border-b-2 border-b-[#47454A] flex justify-between py-4 px-2">
                    <p>Kecamatan</p>
                    <p>{{Auth::user()->KECAMATAN}}</p>
                </div>
                <div class="border-b-2 border-b-[#47454A] flex justify-between py-4 px-2">
                    <p>Kota</p>
                    <p>{{Auth::user()->KOTA}}</p>
                </div>
                <div class="border-b-2 border-b-[#47454A] flex justify-between py-4 px-2">
                    <p>Provinsi</p>
                    <p>{{Auth::user()->PROVINSI}}</p>
                </div>
                <div class="border-b-2 border-b-[#47454A] flex justify-between py-4 px-2">
                    <p>Negara</p>
                    <p>{{Auth::user()->NEGARA}}</p>
                </div>
            </div>
            <div class="mx-6 mt-9 flex justify-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
    
                    <button :href="route('logout')" class="text-white bg-gradient-to-r from-[#ED1B24] to-[#C41118] hover:from-[#C41118] hover:to-[#ED1B24] font-bold px-6 py-2 text-[12px] uppercase tracking-wider border-2 border-[#ED1B24] hover:border-[#FF2030] transition-all duration-200 flex items-center gap-2 w-[1120px] flex justify-center"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>

            <!-- ------------------------------- CARD -------------------------------------------------- -->
            <p class="text-white font-poppins text-[20px] font-semibold mt-9 mb-2 mx-6">RIWAYAT SEWA</p>

            @foreach ($data as $item)
            <div class="bg-gradient-to-r from-zinc-900 to-black border-l-4 border-amber-500 shadow-xl my-3 overflow-hidden font-poppins hover:border-amber-400 transition-all duration-300 mx-6 h-[100px] flex">
                
                {{-- Left Section - Product & Plat --}}
                <div class="bg-black/30 border-r border-zinc-800 px-5 flex items-center w-[300px]">
                    <div>
                        <p class="text-white font-bold text-lg leading-tight mb-2">{{ $item['produk']->produk }}</p>
                        <div class="inline-flex items-center gap-2 bg-zinc-950 border border-amber-900/30 px-3 py-1">
                            <div class="w-1 h-4 bg-amber-500"></div>
                            <p class="text-xs font-mono font-bold text-amber-500 tracking-widest">{{ $item['produk']->plat }}</p>
                        </div>
                    </div>
                </div>

                {{-- Middle Left - Owner Info --}}
                <div class="border-r border-zinc-800 px-5 flex items-center w-[240px] bg-zinc-950/30">
                    <div>
                        <p class="text-[9px] text-zinc-500 uppercase tracking-widest font-bold mb-1">Owner</p>
                        <p class="text-white font-bold text-sm mb-1">{{ $item['owner']->name }}</p>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-3 h-3 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            <p class="text-xs text-zinc-400 font-medium">{{ $item['owner']->no_wa ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Middle Right - Date Info --}}
                <div class="flex-1 px-5 py-3 flex items-center gap-5 bg-black/20">
                    
                    {{-- Start Date --}}
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <div class="w-1.5 h-1.5 bg-green-500"></div>
                            <p class="text-[9px] text-zinc-500 uppercase tracking-widest font-bold">Start</p>
                        </div>
                        <p class="text-white font-bold text-sm leading-tight">
                            {{ \Carbon\Carbon::parse($item['rent']->waktu_mulai)->translatedFormat('d M Y') }}
                        </p>
                        <p class="text-zinc-400 text-xs">
                            {{ \Carbon\Carbon::parse($item['rent']->waktu_mulai)->translatedFormat('H:i') }}
                        </p>
                    </div>

                    <div class="h-12 w-px bg-zinc-800"></div>

                    {{-- End Date --}}
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <div class="w-1.5 h-1.5 bg-red-500"></div>
                            <p class="text-[9px] text-zinc-500 uppercase tracking-widest font-bold">End</p>
                        </div>
                        <p class="text-white font-bold text-sm leading-tight">
                            {{ \Carbon\Carbon::parse($item['rent']->waktu_mulai)->addDays($item['rent']->durasi)->translatedFormat('d M Y') }}
                        </p>
                        <p class="text-zinc-400 text-xs">
                            {{ \Carbon\Carbon::parse($item['rent']->waktu_mulai)->addDays($item['rent']->durasi)->translatedFormat('H:i') }}
                        </p>
                    </div>
                </div>

                {{-- Right Section - WhatsApp Button --}}
                <div class="w-[180px] flex items-center justify-center border-l border-zinc-800 bg-black/40">
                    <a 
                        href="https://wa.me/{{ $item['owner']->no_wa }}?text=Halo%20kak%2C%20saya%20ingin%20bertanya%20soal%20sewa%20{{ urlencode($item['produk']->produk) }}"
                        target="_blank"
                        class="flex items-center justify-center gap-2 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-500 hover:to-green-600 text-white font-bold text-[10px] uppercase tracking-wider px-4 py-2 transition-all duration-200 border border-green-500"
                    >
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        CHAT
                    </a>
                </div>
            </div>
            @endforeach
            <div class="flex justify-center pb-5">
                {{ $data->links() }}
            </div>
        </div>
    </body>
</html>