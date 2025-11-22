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
        <div class="mx-6">
            <!--------------------------------------UPPERNAV------------------------------------------------------->
            <div class="flex justify-between px-6 items-center py-3 border-b-2 border-b-[#47454A]">
                <p class="font-poppins italic font-semibold text-[28px] text-white">AutoRent</p>
                <div class="flex gap-6">
                    <form action="" method="">
                        <button class="font-poppins text-[#ED1B24] transition duration-300 ease-in-out">Dashboard</button>
                    </form>
                    <form action="/pesanan-saya/{{Auth::user()->id}}" method="GET">
                        <button type="submit" class="font-poppins text-white hover:text-[#ED1B24] transition duration-300 ease-in-out">Pesanan saya</button>
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
            <div class="flex justify-center">
                <div class="bg-[#000000] mt-5 shadow-md w-[1120px] h-[200px] relative overflow-hidden">
                    <div class="absolute h-[200px] w-[1120px] z-50">
                        <p class="font-poppins absolute left-[480px] top-[60px] text-white">STORE NAME</p>
                        <p class="font-poppins font-bold absolute left-[340px] text-[32px] top-[70px] text-white">RAFFIAUOTO</p>

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

            <div class="px-6 text-white font-poppins pt-[32px]">
                <p class="font-semibold text-[24px]">PERINGATAN</p>

            <div class=" mt-3 font-poppins">
                @if(count($warnings) === 0)
                    {{-- No Warning State --}}
                    <div class="bg-gradient-to-r from-zinc-900 to-black border-l-4 border-green-500 px-6 py-3 flex items-center gap-4">
                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-zinc-300 font-medium tracking-wide">Tidak ada peringatan</p>
                    </div>
                @else
                    {{-- Warning Cards --}}
                    <div class="space-y-3">
                        @foreach($warnings as $w)
                            <div class="bg-gradient-to-r from-red-950 to-black border-l-4 border-red-500 overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 flex">
                                
                                {{-- Left Section - Warning Icon --}}
                                <div class="bg-black/50 border-r border-red-900/50 px-4 flex items-center justify-center w-[100px]">
                                    <div class="bg-red-500 p-2">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>

                                {{-- Middle Section - Info --}}
                                <div class="flex-1 px-5 py-4 flex flex-col justify-between">
                                    <div class="flex items-start justify-between gap-4">
                                        <div class="flex-1">
                                            <p class="text-white font-bold text-lg leading-tight mb-1">{{ $w['produk'] }}</p>
                                            <p class="text-zinc-400 text-sm">Penyewa: <span class="text-white font-semibold">{{ $w['penyewa'] }}</span></p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-[9px] text-red-400 uppercase tracking-wider font-bold mb-1">Melewati waktu sewa</p>
                                            <p class="text-white font-bold text-sm">{{ $w['expired_at'] }}</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Right Section - WhatsApp Button --}}
                                <div class="w-[200px] flex items-center justify-center border-l border-red-900/50 bg-black/30">
                                    <a href="https://wa.me/{{ $w['no_wa'] }}?text=Halo%20kak%2C%20waktu%20sewa%20Anda%20sudah%20melewati%20durasi."
                                    target="_blank"
                                    class="flex items-center justify-center gap-2 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-500 hover:to-green-600 text-white font-bold text-[11px] uppercase tracking-wider px-4 py-2.5 transition-all duration-200 border border-green-500">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                        </svg>
                                        CHAT
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            </div>

            <!--------------------------------------BODY------------------------------------------------------->
            <div class="flex justify-between mt-10 font-poppins mx-6 items-center">
                <div x-data="{ open: false }" class="relative flex-1 font-poppins">
                    {{-- Trigger Button --}}
                    <button @click="open = true" class="bg-gradient-to-r from-[#ED1B24] to-[#C41118] hover:from-[#C41118] hover:to-[#ED1B24] text-white font-bold px-6 py-2.5 text-[12px] uppercase tracking-wider border-2 border-[#ED1B24] hover:border-[#FF2030] transition-all duration-200 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                        </svg>
                        TAMBAH MOBIL
                    </button>

                    {{-- Modal --}}
                    <div x-show="open" x-cloak class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm flex items-center justify-center">
                        <div @click.away="open = false" class="bg-zinc-900 w-[500px] border border-zinc-800 shadow-2xl overflow-hidden">
                            
                            {{-- Modal Header --}}
                            <div class="flex justify-between items-center px-6 py-4 bg-black border-b-2 border-[#ED1B24]">
                                <h2 class="text-lg font-bold text-white uppercase tracking-wide flex items-center gap-3">
                                    <div class="bg-[#ED1B24] p-1.5">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/>
                                        </svg>
                                    </div>
                                    Tambah Mobil
                                </h2>
                                <button @click="open = false" class="w-8 h-8 flex items-center justify-center border-2 border-zinc-700 hover:bg-zinc-800 hover:border-[#ED1B24] transition-all text-zinc-400 hover:text-white font-bold text-xl">×</button>
                            </div>

                            {{-- Modal Body --}}
                            <div class="p-6 max-h-[70vh] overflow-y-auto bg-gradient-to-b from-zinc-900 to-black">
                                <form action="/stored-product" method="POST">
                                    @csrf
                                    
                                    {{-- Row 1: Nama Produk & Harga --}}
                                    <div class="grid grid-cols-2 gap-3 mb-3">
                                        <div>
                                            <label for="produk" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Nama Produk</label>
                                            <input name="produk" type="text" id="produk" class="w-full px-4 py-2.5 bg-zinc-950 border-2 border-zinc-800 text-white text-sm focus:outline-none focus:border-[#ED1B24] transition-all placeholder:text-zinc-600" placeholder="Contoh: Avanza 2020">
                                        </div>
                                        <div>
                                            <label for="harga" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Harga</label>
                                            <input name="harga" type="text" id="harga" class="w-full px-4 py-2.5 bg-zinc-950 border-2 border-zinc-800 text-white text-sm focus:outline-none focus:border-[#ED1B24] transition-all placeholder:text-zinc-600" placeholder="250000">
                                        </div>
                                    </div>

                                    {{-- Row 2: Jumlah Durasi & Satuan --}}
                                    <div class="grid grid-cols-2 gap-3 mb-3">
                                        <div>
                                            <label for="jumlah_durasi" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Jumlah Durasi</label>
                                            <input name="jumlah_durasi" type="text" id="jumlah_durasi" class="w-full px-4 py-2.5 bg-zinc-950 border-2 border-zinc-800 text-white text-sm focus:outline-none focus:border-[#ED1B24] transition-all placeholder:text-zinc-600" placeholder="1">
                                        </div>
                                        <div>
                                            <label for="satuan" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Satuan</label>
                                            <input name="satuan" type="text" id="satuan" class="w-full px-4 py-2.5 bg-zinc-950 border-2 border-zinc-800 text-white text-sm focus:outline-none focus:border-[#ED1B24] transition-all placeholder:text-zinc-600" placeholder="Hari">
                                        </div>
                                    </div>

                                    {{-- Row 3: Plat & Minus --}}
                                    <div class="grid grid-cols-2 gap-3 mb-3">
                                        <div>
                                            <label for="plat" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Plat Nomor</label>
                                            <input name="plat" type="text" id="plat" class="w-full px-4 py-2.5 bg-zinc-950 border-2 border-zinc-800 text-white text-sm focus:outline-none focus:border-[#ED1B24] transition-all placeholder:text-zinc-600 font-mono tracking-wider" placeholder="B 1234 XYZ">
                                        </div>
                                        <div>
                                            <label for="minus" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Minus / Kekurangan</label>
                                            <input name="minus" type="text" id="minus" class="w-full px-4 py-2.5 bg-zinc-950 border-2 border-zinc-800 text-white text-sm focus:outline-none focus:border-[#ED1B24] transition-all placeholder:text-zinc-600" placeholder="Lecet kecil">
                                        </div>
                                    </div>

                                    {{-- Row 4: Deskripsi --}}
                                    <div class="mb-4">
                                        <label for="deskripsi" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Deskripsi</label>
                                        <textarea name="desk" id="deskripsi" rows="3" class="w-full px-4 py-2.5 bg-zinc-950 border-2 border-zinc-800 text-white text-sm focus:outline-none focus:border-[#ED1B24] transition-all placeholder:text-zinc-600 resize-none" placeholder="Deskripsi lengkap kendaraan..."></textarea>
                                    </div>

                                    {{-- Hidden Field --}}
                                    <input name="owner_id" type="hidden" value="{{ Auth::user()->id }}" id="owner_id">

                                    {{-- Submit Button --}}
                                    <button type="submit" class="w-full bg-gradient-to-r from-[#ED1B24] to-[#C41118] hover:from-[#C41118] hover:to-[#ED1B24] text-white font-bold py-3.5 uppercase tracking-wider transition-all duration-200 border-t-2 border-[#FF2030] text-sm flex items-center justify-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        SIMPAN PRODUK
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="search" method="GET">
                    @csrf
                    <div class="flex gap-0 font-poppins">
                        <input 
                            name="cari" 
                            type="text" 
                            placeholder="CARI KENDARAAN..." 
                            class="h-[42px] bg-zinc-950 text-white text-[13px] px-5 border-2 border-zinc-800 focus:border-[#ED1B24] focus:outline-none transition-all duration-200 w-[320px] uppercase tracking-wide placeholder:text-zinc-600 placeholder:font-medium"
                        >
                        <button 
                            type="submit" 
                            class="bg-gradient-to-r from-[#ED1B24] to-[#C41118] hover:from-[#C41118] hover:to-[#ED1B24] text-white font-bold h-[42px] px-8 border-2 border-[#ED1B24] hover:border-[#FF2030] transition-all duration-200 uppercase tracking-wider text-[12px] flex items-center gap-2"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            CARI
                        </button>
                    </div>
                </form>
            </div>

            <!-- ------------------------------- CARD -------------------------------------------------- -->
            <div class="flex justify-center flex-wrap gap-3 py-10">
                @foreach($datas as $dt)
                <div class="bg-gradient-to-b from-zinc-900 to-black hover:from-[#ED1B24] hover:to-[#C41118] w-[240px] h-[300px] group transition-all duration-300 ease-in-out border border-zinc-800 hover:border-[#ED1B24] shadow-xl font-poppins overflow-hidden">
                    
                    {{-- Image Section --}}
                    <div class="relative w-[240px] h-[170px] bg-[url('/public/img/2pp.png')] bg-cover bg-center overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        
                        {{-- Action Buttons --}}
                        <div class="absolute top-2 right-2 flex gap-2">
                            
                            {{-- Button Edit --}}
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = true" class="bg-black/80 hover:bg-[#ED1B24] text-white px-3 py-1 text-[11px] uppercase tracking-wider font-semibold border border-zinc-700 hover:border-[#ED1B24] transition-all duration-200 backdrop-blur-sm">
                                    EDIT
                                </button>

                                {{-- Modal Edit --}}
                                <div x-show="open" x-cloak class="fixed inset-0 z-50 bg-black/70 backdrop-blur-sm flex items-center justify-center">
                                    <div @click.away="open = false" class="bg-zinc-900 w-[450px] border border-zinc-800 shadow-2xl overflow-hidden">
                                        
                                        {{-- Modal Header --}}
                                        <div class="flex justify-between items-center px-6 py-4 bg-black border-b border-zinc-700">
                                            <h2 class="text-lg font-bold text-white uppercase tracking-wide">
                                                Edit Mobil
                                            </h2>
                                            <button @click="open = false" class="w-8 h-8 flex items-center justify-center border border-zinc-700 hover:bg-zinc-800 transition text-zinc-400 hover:text-white font-bold text-xl">×</button>
                                        </div>

                                        {{-- Modal Body --}}
                                        <div class="p-6 max-h-[70vh] overflow-y-auto">
                                            <form action="{{ route('update.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$dt->id}}">
                                                
                                                <div class="grid grid-cols-2 gap-3 mb-3">
                                                    <div>
                                                        <label for="produk" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-wider mb-2">Nama Produk</label>
                                                        <input value="{{$dt->produk}}" name="produk" type="text" id="produk" class="w-full px-3 py-2 bg-zinc-950 border border-zinc-700 text-white focus:outline-none focus:border-[#ED1B24] transition-colors">
                                                    </div>
                                                    <div>
                                                        <label for="harga" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-wider mb-2">Harga</label>
                                                        <input value="{{$dt->harga}}" name="harga" type="text" id="harga" class="w-full px-3 py-2 bg-zinc-950 border border-zinc-700 text-white focus:outline-none focus:border-[#ED1B24] transition-colors">
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-2 gap-3 mb-3">
                                                    <div>
                                                        <label for="jum_durasi" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-wider mb-2">Jumlah Durasi</label>
                                                        <input value="{{$dt->jum_durasi}}" name="jum_durasi" type="text" id="jumlah_durasi" class="w-full px-3 py-2 bg-zinc-950 border border-zinc-700 text-white focus:outline-none focus:border-[#ED1B24] transition-colors">
                                                    </div>
                                                    <div>
                                                        <label for="satuan_duraso" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-wider mb-2">Satuan</label>
                                                        <input value="{{$dt->satuan_durasi}}" name="satuan_durasi" type="text" id="satuan_durasi" class="w-full px-3 py-2 bg-zinc-950 border border-zinc-700 text-white focus:outline-none focus:border-[#ED1B24] transition-colors">
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-2 gap-3 mb-3">
                                                    <div>
                                                        <label for="plat" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-wider mb-2">Plat</label>
                                                        <input value="{{$dt->plat}}" name="plat" type="text" id="plat" class="w-full px-3 py-2 bg-zinc-950 border border-zinc-700 text-white focus:outline-none focus:border-[#ED1B24] transition-colors">
                                                    </div>
                                                    <div>
                                                        <label for="minus" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-wider mb-2">Minus</label>
                                                        <input value="{{$dt->minus}}" name="minus" type="text" id="minus" class="w-full px-3 py-2 bg-zinc-950 border border-zinc-700 text-white focus:outline-none focus:border-[#ED1B24] transition-colors">
                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <label for="deskripsi" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-wider mb-2">Deskripsi</label>
                                                    <input value="{{$dt->deskripsi}}" name="deskripsi" type="text" id="deskripsi" class="w-full px-3 py-2 bg-zinc-950 border border-zinc-700 text-white focus:outline-none focus:border-[#ED1B24] transition-colors">
                                                </div>

                                                <input name="owner_id" type="hidden" value="{{ Auth::user()->id }}" id="owner_id">

                                                <button type="submit" class="w-full bg-gradient-to-r from-[#ED1B24] to-[#C41118] hover:from-[#C41118] hover:to-[#ED1B24] text-white font-bold py-3 uppercase tracking-wider transition-all duration-200 border-t-2 border-red-400">
                                                    Simpan Produk
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Button Hapus --}}
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = true" class="bg-black/80 hover:bg-[#ED1B24] text-white px-3 py-1 text-[11px] uppercase tracking-wider font-semibold border border-zinc-700 hover:border-[#ED1B24] transition-all duration-200 backdrop-blur-sm">
                                    HAPUS
                                </button>

                                {{-- Modal Hapus --}}
                                <div x-show="open" x-cloak class="fixed inset-0 z-50 bg-black/70 backdrop-blur-sm flex items-center justify-center">
                                    <div @click.away="open = false" class="bg-zinc-900 w-[400px] border border-zinc-800 shadow-2xl overflow-hidden">
                                        
                                        {{-- Modal Header --}}
                                        <div class="flex justify-between items-center px-6 py-4 bg-black border-b border-zinc-700">
                                            <h2 class="text-base font-bold text-white uppercase tracking-wide">
                                                Hapus Mobil
                                            </h2>
                                            <button @click="open = false" class="w-8 h-8 flex items-center justify-center border border-zinc-700 hover:bg-zinc-800 transition text-zinc-400 hover:text-white font-bold text-xl">×</button>
                                        </div>

                                        {{-- Modal Body --}}
                                        <div class="p-6">
                                            <p class="text-zinc-300 mb-6 text-sm">Yakin menghapus mobil ini? Tindakan ini tidak dapat dibatalkan.</p>
                                            
                                            <form action="/delete_product/{{$dt->id}}" method="GET">
                                                <div class="flex gap-3">
                                                    <button type="button" @click="open = false" class="flex-1 bg-zinc-800 hover:bg-zinc-700 text-white font-semibold py-3 uppercase tracking-wider border border-zinc-700 transition-all duration-200">
                                                        Batal
                                                    </button>
                                                    <button type="submit" class="flex-1 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white font-bold py-3 uppercase tracking-wider transition-all duration-200 border-t-2 border-red-400">
                                                        Hapus
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <a class="inline-block text-white text-[11px] font-bold uppercase tracking-widest bg-[#ED1B24] group-hover:bg-black px-4 py-2 border border-[#ED1B24] group-hover:border-white transition-all duration-300" href="{{ route('history.product', $dt->id) }}">
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