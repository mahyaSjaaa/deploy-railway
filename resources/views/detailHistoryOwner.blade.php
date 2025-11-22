<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite('resources/css/app.css')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <style>
            [x-cloak] { display: none !important; }
        </style>
    </head>
</head>
<body>
    <body class="antialiased bg-[#1C1C1C]">
        <div class="">
            <div>
                <div class="flex justify-between px-6 items-center py-3 border-b-2 border-b-[#47454A]">
                    <p class="font-poppins italic font-semibold text-[28px] text-white">AutoRent</p>
                    <div class="flex gap-4 items-center">
                        <p class="text-white">O</p>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" class="font-poppins text-white"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
            </div>
            <!--------------------------------------HEADER------------------------------------------------------->
            <div class="flex justify-center mt-8">
                <div class="bg-[#000000] mt-5 shadow-md w-[1120px] h-[200px] relative overflow-hidden">
                    <div class="absolute h-[200px] w-[1120px] z-50">
                        <p class="font-poppins absolute left-[450px] top-[60px] text-white">PRODUCT NAME</p>
                        <p class="font-poppins font-bold absolute left-[340px] text-[32px] top-[70px] text-white">{{$data->produk}}</p>

                        <div class="absolute w-[150px] h-[1px] left-[350px] bottom-[38px] bg-white z-50"></div>
                        <div class="absolute w-[150px] h-[1px] left-[240px] bottom-[24px] bg-white z-50"></div>

                        <p class="font-poppins absolute left-[670px] top-[60px] text-white">RATING</p>
                        <p class="font-poppins font-bold absolute left-[725px] text-[32px] top-[70px] text-white">BAIK</p>

                        <div class="absolute w-[150px] h-[1px] left-[646px] bottom-[38px] bg-white z-50"></div>
                        <div class="absolute w-[150px] h-[1px] left-[525px] bottom-[24px] bg-white z-50"></div>

                        <p class="font-poppins absolute left-[950px] top-[60px] text-white">PENYEWA</p>
                        <p class="font-poppins font-bold absolute left-[1010px] text-[32px] top-[70px] text-white">+50</p>

                        <div class="absolute w-[150px] h-[1px] left-[950px] bottom-[38px] bg-white z-50"></div>
                        <div class="absolute w-[150px] h-[1px] left-[825px] bottom-[24px] bg-white z-50"></div>
                    </div>
                    <div class="absolute bg-[url('/public/img/2pp.png')] h-[200px] w-[400px] left-0 z-10"></div>
                    <div class="absolute bg-[#ED1B24] h-[200px] w-[480px] left-[200px] -rotate-45 z-20"></div>
                    <div class="absolute bg-[#ED1B24] h-[240px] w-[480px] left-[790px] -rotate-45 z-20"></div>
                </div>
            </div>

            <!-- ------------------------------- CARD -------------------------------------------------- -->
             
            <div class="flex flex-wrap justify-center gap-10">
                
                {{-- PLAT NOMOR Card --}}
                <div class="flex justify-center flex-wrap gap-3 py-10">
                    <div class="bg-gradient-to-br from-zinc-900 to-black w-[345px] h-[300px] border border-zinc-800 hover:border-amber-500 group transition-all duration-300 ease-in-out shadow-2xl font-poppins overflow-hidden">
                        
                        {{-- Header --}}
                        <div class="bg-black border-b border-zinc-800 px-4 py-3 flex items-center gap-3">
                            <div class="bg-amber-500 p-1.5">
                                <svg class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8a1 1 0 00-.553.894l2 2A1 1 0 0017 10v-3a1 1 0 00-1.447-.894l-2 2zM2 13a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2z"/>
                                </svg>
                            </div>
                            <p class="text-[10px] text-zinc-400 uppercase tracking-widest font-bold">Plat Nomor</p>
                        </div>

                        {{-- Content --}}
                        <div class="flex justify-center items-center h-[240px] px-6">
                            <div class="text-center">
                                <div class="inline-flex items-center gap-3 bg-zinc-950 border-2 border-amber-500 px-6 py-4">
                                    <div class="w-1.5 h-16 bg-amber-500"></div>
                                    <p class="text-amber-500 font-black text-3xl tracking-widest font-mono">{{$data->plat}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MINUS Card --}}
                <div class="flex justify-center flex-wrap gap-3 py-10">
                    <div class="bg-gradient-to-br from-zinc-900 to-black w-[345px] h-[300px] border border-zinc-800 hover:border-[#ED1B24] group transition-all duration-300 ease-in-out shadow-2xl font-poppins overflow-hidden">
                        
                        {{-- Header --}}
                        <div class="bg-black border-b border-zinc-800 px-4 py-3 flex items-center gap-3">
                            <div class="bg-[#ED1B24] p-1.5">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <p class="text-[10px] text-zinc-400 uppercase tracking-widest font-bold">Minus / Kekurangan</p>
                        </div>

                        {{-- Content --}}
                        <div class="flex justify-center items-center h-[240px] px-6">
                            <div class="text-center">
                                <div class="border-l-4 border-[#ED1B24] bg-zinc-950/50 px-5 py-4 text-left">
                                    <p class="text-white font-semibold text-base leading-relaxed">{{$data->minus}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- DESKRIPSI Card --}}
                <div class="flex justify-center flex-wrap gap-3 py-10">
                    <div class="bg-gradient-to-br from-zinc-900 to-black w-[345px] h-[300px] border border-zinc-800 hover:border-blue-500 group transition-all duration-300 ease-in-out shadow-2xl font-poppins overflow-hidden">
                        
                        {{-- Header --}}
                        <div class="bg-black border-b border-zinc-800 px-4 py-3 flex items-center gap-3">
                            <div class="bg-blue-500 p-1.5">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <p class="text-[10px] text-zinc-400 uppercase tracking-widest font-bold">Deskripsi</p>
                        </div>

                        {{-- Content --}}
                        <div class="flex justify-center items-center h-[240px] px-6">
                            <div class="text-center w-full">
                                <div class="border border-zinc-800 bg-zinc-950/30 px-5 py-4 text-left">
                                    <p class="text-zinc-300 text-sm leading-relaxed">{{$data->deskripsi}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!--------------------------------------BODY------------------------------------------------------->
            <div class="flex justify-between px-6 text-white font-poppins items-center">
                <p class="text-[24px] font-semibold">RIWAYAT PENYEWA</p>
                <form action="/history/{{ $data->id }}/searchPenyewa" method="GET">
                    <div class="flex items-center">
                        <input name="name" type="text" placeholder="cari penyewa" 
                            placeholder="CARI PENYEWA..." 
                            class="h-[42px] bg-zinc-950 text-white text-[13px] px-5 border-2 border-zinc-800 focus:border-[#ED1B24] focus:outline-none transition-all duration-200 w-[320px] uppercase tracking-wide placeholder:text-zinc-600 placeholder:font-medium">
                        <button type="submit" class="bg-gradient-to-r from-[#ED1B24] to-[#C41118] hover:from-[#C41118] hover:to-[#ED1B24] text-white font-bold h-[42px] px-8 border-2 border-[#ED1B24] hover:border-[#FF2030] transition-all duration-200 uppercase tracking-wider text-[12px] flex items-center gap-2"> <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            CARI</button>
                    </div>
                </form>
            </div>

            @foreach($verify as $vr)
            <div class="bg-gradient-to-r from-zinc-900 to-black border-l-4 border-amber-500 shadow-xl my-5 mb-3 mx-6 font-poppins overflow-hidden hover:border-amber-400 transition-all duration-300 h-[90px] flex">
                
                {{-- Left Section - Penyewa Info --}}
                <div class="bg-black/30 border-r border-zinc-800 px-5 flex items-center w-[280px]">
                    <div class="flex items-center gap-3">
                        <div class="bg-amber-500 p-2">
                            <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[9px] text-zinc-500 uppercase tracking-widest font-bold mb-1">Penyewa</p>
                            <p class="text-white font-bold text-base leading-tight">
                                {{ \App\Models\User::find($vr->penyewa_id)->name }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Middle Section - Date Info --}}
                <div class="flex-1 px-5 py-3 flex items-center gap-6">
                    
                    {{-- Tanggal Mulai --}}
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <div class="w-1.5 h-1.5 bg-green-500"></div>
                            <p class="text-[9px] text-zinc-500 uppercase tracking-widest font-bold">Start</p>
                        </div>
                        <p class="text-white font-bold text-sm leading-tight">
                            {{ \Carbon\Carbon::parse($vr->waktu_mulai)->translatedFormat('d M Y') }}
                        </p>
                        <p class="text-zinc-400 text-xs">
                            {{ \Carbon\Carbon::parse($vr->waktu_mulai)->translatedFormat('H:i') }}
                        </p>
                    </div>

                    <div class="h-12 w-px bg-zinc-800"></div>

                    {{-- Tanggal Selesai --}}
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <div class="w-1.5 h-1.5 bg-red-500"></div>
                            <p class="text-[9px] text-zinc-500 uppercase tracking-widest font-bold">End</p>
                        </div>
                        <p class="text-white font-bold text-sm leading-tight">
                            {{ \Carbon\Carbon::parse($vr->waktu_mulai)->addDays($vr->durasi)->translatedFormat('d M Y') }}
                        </p>
                        <p class="text-zinc-400 text-xs">
                            {{ \Carbon\Carbon::parse($vr->waktu_mulai)->addDays($vr->durasi)->translatedFormat('H:i') }}
                        </p>
                    </div>
                </div>

                {{-- Right Section - Alasan --}}
                <div class="bg-zinc-950/50 border-l border-zinc-800 px-5 flex items-center w-[300px]">
                    <div class="w-full">
                        <p class="text-[9px] text-zinc-500 uppercase tracking-widest font-bold mb-1">Alasan</p>
                        <p class="text-zinc-300 text-sm leading-tight line-clamp-2">{{ $vr->alasan }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </body>
</body>
</html>