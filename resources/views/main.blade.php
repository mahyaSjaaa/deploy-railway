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
    <body class="antialiased min-h-screen bg-gradient-to-b from-[#1C1C1C] from-65% to-[#ED1B24]">
        <div class="">
            <!--------------------------------------UPPERNAV------------------------------------------------------->
            <div class="flex justify-between px-6 items-center py-3 border-b-2 border-b-[#47454A]">
                <p class="font-poppins italic font-semibold text-[28px] text-white">AutoRent</p>
                <div class="flex gap-4 items-center">
                <form action="/searchMain" method="GET">
                    @csrf
                    <div class="flex gap-2 ml-[120px]">
                        <input name="cari" type="text" placeholder="cari mobil sesaui kebutuhanmu" class="h-[42px] bg-zinc-950 text-white text-[13px] px-5 border-2 border-zinc-800 focus:border-[#ED1B24] focus:outline-none transition-all duration-200 w-[320px] uppercase tracking-wide placeholder:text-zinc-600 placeholder:font-medium">
                        <button type="submit" class="bg-gradient-to-r from-[#ED1B24] to-[#C41118] hover:from-[#C41118] hover:to-[#ED1B24] text-white font-bold h-[42px] px-8 border-2 border-[#ED1B24] hover:border-[#FF2030] transition-all duration-200 uppercase tracking-wider text-[12px] flex items-center gap-2">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>    
                        Cari</button>
                    </div>
                </form>
                </div>
                <div class="flex gap-6">
                    <form action="/main" method="GET">
                        <button type="submit" class="font-poppins text-[#ED1B24] transition duration-300 ease-in-out">Beranda</button>
                    </form>
                    <form action="/sewa-saya/{{Auth::user()->id}}" method="GET">
                        @csrf
                        <button type="submit" class="font-poppins text-white hover:text-[#ED1B24] transition duration-300 ease-in-out">Sewa saya</button>
                    </form>
                    <form action="/profilUser" method="GET">
                        <button type="submit" class="font-poppins text-white hover:text-[#ED1B24] transition duration-300 ease-in-out">Profil</button>
                    </form>
                </div>
            </div>

            <!--------------------------------------HEADER------------------------------------------------------->
            <div class="">

            </div>

            <!-- ------------------------------- CARD -------------------------------------------------- -->
            <div class="flex justify-center flex-wrap gap-3 py-10">
                @foreach($datas as $dt)
                <div class="bg-gradient-to-b from-zinc-900 to-black hover:from-[#ED1B24] hover:to-[#C41118] w-[240px] h-[300px] group transition-all duration-300 ease-in-out border border-zinc-800 hover:border-[#ED1B24] shadow-xl font-poppins overflow-hidden">
                    
                    {{-- Image Section --}}
                    <div class="relative w-[240px] h-[170px] bg-[url('/public/img/2pp.png')] bg-cover bg-center overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        
                        {{-- Action Buttons --}}
                    </div>

                    {{-- Content Section --}}
                    <div class="px-4 py-4 flex flex-col justify-between h-[130px]">
                        <div>
                            <p class="text-white font-bold text-base leading-tight mb-2 tracking-wide">{{$dt->produk}}</p>
                            <p class="text-zinc-300 text-[13px] font-medium">
                                <span class="text-white font-bold">Rp. {{$dt->harga}}</span>
                                <span class="text-zinc-500">/{{$dt->jum_durasi}} {{$dt->satuan_durasi}}</span>
                            </p>
                        </div>
                        
                        <div class="mt-auto">
                            <a class="inline-block text-white text-[11px] font-bold uppercase tracking-widest bg-[#ED1B24] group-hover:bg-black px-4 py-2 border border-[#ED1B24] group-hover:border-white transition-all duration-300" href="{{ route('detail.product', $dt->id) }}">
                                DETAIL →
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="flex justify-center pb-5">
                {{ $datas->links() }}
            </div>
            
        </div>
    </body>
</html>