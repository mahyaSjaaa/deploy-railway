<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite('resources/css/app.css')
    </head>
</head>
<body>
    <body class="antialiased min-h-screen bg-gradient-to-b from-[#1C1C1C] from-65% to-[#ED1B24]">
            <div class="flex justify-between px-6 items-center py-3 border-b-2 border-b-[#47454A]">
                <p class="font-poppins italic font-semibold text-[28px] text-white">AutoRent</p>
                <div class="flex gap-4 items-center">
                </div>
                <div class="flex gap-6">
                    <form action="/main" method="GET">
                        <button type="submit" class="font-poppins text-white hover:text-[#ED1B24] transition duration-300 ease-in-out">Beranda</button>
                    </form>
                    <form action="/sewa-saya/{{Auth::user()->id}}" method="GET">
                        <button type="submit" class="font-poppins text-[#ED1B24] transition duration-300 ease-in-out">Sewa saya</button>
                    </form>
                    <form action="/profilUser" method="GET">
                        <button type="submit" class="font-poppins text-white hover:text-[#ED1B24] transition duration-300 ease-in-out">Profil</button>
                    </form>
                </div>
            </div>

            @foreach ($verify as $i => $vr)
            <div class="flex justify-center">
                <div class="bg-gradient-to-br from-zinc-900 to-black my-5 shadow-2xl w-[1120px] h-[200px] overflow-hidden border border-zinc-800 hover:border-zinc-700 transition-all duration-300">
                    <div class="flex justify-between font-poppins text-white h-full">

                        {{-- PRODUK IMAGE --}}
                        <div class="bg-gradient-to-br from-zinc-800 to-zinc-900 h-[200px] w-[200px] flex items-center justify-center border-r border-zinc-800">
                            {{-- Gambar atau apa --}}
                            <div class="text-zinc-600">
                                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/>
                                </svg>
                            </div>
                        </div>

                        <div class="w-[920px] flex flex-col">

                            {{-- HEADER SECTION --}}
                            <div class="flex justify-between h-[100px] bg-gradient-to-r from-zinc-900 to-black border-b border-zinc-800 px-8 py-5">
                                <div class="flex flex-col justify-center">
                                    {{-- PRODUK --}}
                                    <p class="font-bold text-[28px] leading-tight text-white mb-1">
                                        {{ $arr1[$i]->produk }}
                                    </p>

                                    {{-- USER --}}
                                    <p class="text-zinc-400 text-sm font-light">{{ $user->name }}</p>
                                </div>
                                
                                <div class="flex flex-col justify-center text-right">
                                    {{-- VERIFY --}}
                                    <p class="font-bold text-[28px] leading-tight text-amber-500">
                                        {{ $vr->durasi }} <span class="text-[18px] text-zinc-400 font-normal">{{ $arr1[$i]->satuan_durasi }}</span>
                                    </p>
                                    <p class="text-zinc-400 text-sm mt-1">{{ $vr->alasan }}</p>
                                </div>
                            </div>

                            {{-- DATE SECTION --}}
                            <div class="flex justify-center gap-16 h-[100px] bg-black items-center px-8">
                                <div class="flex flex-col items-center">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                        </svg>
                                        <p class="text-zinc-500 text-xs uppercase tracking-wider font-medium">Mulai Disewa</p>
                                    </div>
                                    <p class="text-white font-semibold text-base">{{ $vr->updated_at->translatedFormat('d F Y') }}</p>
                                    <p class="text-zinc-400 text-sm">{{ $vr->updated_at->translatedFormat('H:i') }}</p>
                                </div>

                                <div class="h-12 w-px bg-zinc-800"></div>

                                <div class="flex flex-col items-center">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                        </svg>
                                        <p class="text-zinc-500 text-xs uppercase tracking-wider font-medium">Selesai Sewa</p>
                                    </div>
                                    <p class="text-white font-semibold text-base">{{ \Carbon\Carbon::parse($vr->updated_at)->addDays($vr->durasi)->translatedFormat('d F Y') }}</p>
                                    <p class="text-zinc-400 text-sm">{{ \Carbon\Carbon::parse($vr->updated_at)->addDays($vr->durasi)->translatedFormat('H:i') }}</p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            @endforeach     
    </body>
</body>
</html>