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
    <body class="antialiased bg-[#1C1C1C]">
        <div class="mx-6">
            <!--------------------------------------UPPERNAV------------------------------------------------------->
            <div class="flex justify-between px-6 items-center py-3 border-b-2 border-b-[#47454A]">
                <p class="font-poppins italic font-semibold text-[28px] text-white">AutoRent</p>
                <div class="flex gap-6">
                    <form action="/dashboard" method="GET">
                        <button type="submit" class="font-poppins text-white hover:text-[#ED1B24] transition duration-300 ease-in-out">Dashboard</button>
                    </form>
                    <form action="/pesanan-saya/{{Auth::user()->id}}" method="GET">
                        @csrf
                        <button type="submit" class="font-poppins text-[#ED1B24]">Pesanan saya</button>
                    </form>
                </div>
                <div class="flex gap-4 items-center">
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
            <!--------------------------------------HEADER------------------------------------------------------->
            <div class="flex justify-between mt-9 font-poppins">
                <p class="text-white font-poppins font-semibold text-[20px]">Pesanan masuk</p>

                <form action="/opsi" method="POST">
                    @csrf
                    <div class="flex gap-2">
                        <select name="opsi" id="opsi">
                            <option value="belum" {{ ($opsi ?? '') == 'belum' ? 'selected' : '' }}>
                                Belum dikonfirmasi
                            </option>
                            <option value="sudah" {{ ($opsi ?? '') == 'sudah' ? 'selected' : '' }}>
                                Dikonfirmasi
                            </option>
                        </select>
                        <button type="submit" class="bg-[#ED1B24] text-white font-poppins">Cari</button>
                    </div>
                </form>
            </div>

 <!-- ------------------------------- CARD -------------------------------------------------- -->
            @foreach ($verify as $i => $vr)
            <div class="flex justify-center">
                <div class="bg-gradient-to-br from-zinc-900 to-black my-5 shadow-2xl w-[1120px] border border-zinc-800 overflow-hidden hover:border-zinc-700 transition-all duration-300">
                    <div class="flex font-poppins text-white">

                        {{-- PRODUK IMAGE --}}
                        <div class="bg-gradient-to-br from-zinc-800 to-zinc-900 h-[200px] w-[200px] flex items-center justify-center border-r border-zinc-800">
                            <div class="text-zinc-600">
                                <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/>
                                </svg>
                            </div>
                        </div>

                        <div class="w-[920px]">

                            {{-- HEADER INFO --}}
                            <div class="flex justify-between items-start px-8 py-5 bg-gradient-to-r from-zinc-900 to-black border-b border-zinc-800">
                                <div>
                                    <p class="font-bold text-[26px] text-white tracking-wide mb-1">{{ $arr1[$i]->produk }}</p>
                                    <p class="text-zinc-400 text-[13px] font-light">{{ $user->name }}</p>
                                </div>
                                
                                <div class="text-right">
                                    <p class="font-bold text-[26px] text-amber-500">
                                        {{ $vr->durasi }} <span class="text-[18px] text-zinc-400 font-normal">{{ $arr1[$i]->satuan_durasi }}</span>
                                    </p>
                                    <p class="text-zinc-400 text-[13px] mt-1">{{ $vr->alasan }}</p>
                                </div>

                                <div class="flex items-center">
                                    <span class="px-4 py-1.5 bg-zinc-800 text-zinc-300 text-[12px] font-medium rounded-md border border-zinc-700">
                                        {{ $vr->status }}
                                    </span>
                                </div>
                            </div>

                            {{-- ========================= --}}
                            {{--      BUTTON SECTION       --}}
                            {{-- ========================= --}}

                            <div class="flex justify-center gap-6 h-[100px] bg-black items-center px-8">

                                {{-- ========================= --}}
                                {{-- Jika BELUM dikonfirmasi   --}}
                                {{-- ========================= --}}
                                @if(($opsi ?? 'belum') === 'belum')

                                    {{-- Button Bukti Bayar --}}
                                    <div x-data="{ open: false }" class="relative flex-1">
                                        <button @click="open = true" class="w-full bg-gradient-to-r from-zinc-800 to-zinc-900 hover:from-zinc-700 hover:to-zinc-800 py-3 text-[13px] font-medium uppercase tracking-wider border border-zinc-700 hover:border-zinc-600 transition-all duration-200 rounded-md">
                                            Bukti Bayar
                                        </button>

                                        <div x-show="open" x-cloak class="fixed inset-0 z-50 bg-black/70 backdrop-blur-sm flex items-center justify-center">
                                            <div @click.away="open = false" class="bg-zinc-900 w-[400px] rounded-xl shadow-2xl border border-zinc-800 overflow-hidden">
                                                <div class="flex justify-between items-center px-6 py-4 bg-gradient-to-r from-zinc-800 to-zinc-900 border-b border-zinc-700">
                                                    <h2 class="text-lg font-semibold text-white">
                                                        Konfirmasi Pesanan
                                                    </h2>
                                                    <button @click="open = false" class="w-8 h-8 flex items-center justify-center border border-zinc-700 rounded-md hover:bg-zinc-800 transition text-zinc-400 hover:text-white">×</button>
                                                </div>

                                                <div class="p-6">
                                                    <img src="{{ asset('storage/' . $vr->bukti_bayar) }}"
                                                        class="w-full rounded-lg border border-zinc-800">

                                                    <form action="/konfirmasi/{{$vr->id}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="waktu_mulai" value="{{$vr->updated_at}}">
                                                        <div class="mt-5">
                                                            <button class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-500 hover:to-green-600 py-3 text-[13px] font-medium uppercase tracking-wider transition-all duration-200 rounded-md" type="submit">
                                                                Konfirmasi Pembayaran
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Button Tolak --}}
                                    <div x-data="{ open: false }" class="relative flex-1">
                                        <button @click="open = true" class="w-full bg-gradient-to-r from-red-900 to-red-950 hover:from-red-800 hover:to-red-900 py-3 text-[13px] font-medium uppercase tracking-wider border border-red-800 hover:border-red-700 transition-all duration-200 rounded-md">
                                            Tolak
                                        </button>

                                        <div x-show="open" x-cloak class="fixed inset-0 z-50 bg-black/70 backdrop-blur-sm flex items-center justify-center">
                                            <div @click.away="open = false" class="bg-zinc-900 w-[400px] rounded-xl shadow-2xl border border-zinc-800 overflow-hidden">
                                                <div class="flex justify-between items-center px-6 py-4 bg-gradient-to-r from-zinc-800 to-zinc-900 border-b border-zinc-700">
                                                    <h2 class="text-lg font-semibold text-white">Tolak Pesanan</h2>
                                                    <button @click="open = false" class="w-8 h-8 flex items-center justify-center border border-zinc-700 rounded-md hover:bg-zinc-800 transition text-zinc-400 hover:text-white">×</button>
                                                </div>

                                                <div class="p-6">
                                                    <p class="text-zinc-300 mb-6">Anda yakin menolak pesanan ini?</p>

                                                    <form action="/tolak/{{$vr->id}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="prod_id" value="{{$vr->prod_id}}">
                                                        <div class="flex gap-3">
                                                            <button type="button" @click="open = false" class="flex-1 bg-zinc-800 hover:bg-zinc-700 py-3 text-[13px] font-medium uppercase tracking-wider border border-zinc-700 transition-all duration-200 rounded-md">
                                                                Batal
                                                            </button>
                                                            <button class="flex-1 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 py-3 text-[13px] font-medium uppercase tracking-wider transition-all duration-200 rounded-md" type="submit">
                                                                Ya, Tolak
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                {{-- ========================= --}}
                                {{-- Jika SUDAH dikonfirmasi   --}}
                                {{-- ========================= --}}
                                @else
                                    <form action="/selesai/{{$vr->id}}" method="POST" class="flex-1">
                                        @csrf
                                        <input type="hidden" name="waktu_mulai" value="{{$vr->updated_at}}">
                                        <input type="hidden" name="prod_id" value="{{$vr->prod_id}}">
                                        <button class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-500 hover:to-green-600 py-3 text-[13px] font-medium uppercase tracking-wider border border-green-700 hover:border-green-600 transition-all duration-200 rounded-md">
                                            Selesaikan Sewa
                                        </button>
                                    </form>
                                @endif

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </body>
</html>