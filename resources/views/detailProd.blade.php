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
    <body class="antialiased min-h-screen bg-gradient-to-b from-[#1C1C1C] from-65% to-[#ED1B24]">
        <div class="">
            <div>
                <div class="flex justify-between px-6 items-center py-3 border-b-2 border-b-[#47454A]">
                    <p class="font-poppins italic font-semibold text-[28px] text-white">AutoRent</p>
                    <div class="flex gap-4 items-center">
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
            </div>
            <!--------------------------------------HEADER------------------------------------------------------->
            <div class="flex justify-center mt-8">
                <div class="bg-[#000000] mt-5 shadow-md w-[1120px] h-[200px] relative overflow-hidden">
                    <div class="absolute h-[200px] w-[1120px] z-50">
                        <p class="font-poppins absolute left-[450px] top-[60px] text-white">PRODUCT NAME</p>
                        <p class="font-poppins font-bold absolute left-[340px] text-[32px] top-[70px] text-white">{{$data->produk}}</p>

                        <div class="absolute w-[150px] h-[1px] left-[350px] bottom-[38px] bg-white z-50"></div>
                        <div class="absolute w-[150px] h-[1px] left-[240px] bottom-[24px] bg-white z-50"></div>

                        <p class="font-poppins absolute left-[640px] top-[60px] text-white">KOTA</p>
                        <p class="font-poppins font-bold absolute left-[655px] text-[32px] top-[70px] text-white">{{Auth::user()->KOTA}}</p>

                        <div class="absolute w-[150px] h-[1px] left-[646px] bottom-[38px] bg-white z-50"></div>
                        <div class="absolute w-[150px] h-[1px] left-[525px] bottom-[24px] bg-white z-50"></div>

                        <p class="font-poppins absolute left-[950px] top-[60px] text-white">HUBUNGI</p>
                        <a href="" class="font-poppins absolute left-[960px] top-[80px] text-white bg-gradient-to-r from-[#ED1B24] to-[#C41118] hover:from-[#C41118] hover:to-[#ED1B24] font-bold px-6 py-2 text-[12px] uppercase tracking-wider border-2 border-[#ED1B24] hover:border-[#FF2030] transition-all duration-200 flex items-center gap-2">WhatsApp</a>

                        <div class="absolute w-[150px] h-[1px] left-[950px] bottom-[38px] bg-white z-50"></div>
                        <div class="absolute w-[150px] h-[1px] left-[825px] bottom-[24px] bg-white z-50"></div>
                    </div>
                    <div class="absolute bg-[url('/public/img/2pp.png')] h-[200px] w-[400px] left-0 z-10"></div>
                    <div class="absolute bg-gradient-to-r from-[#ED1B24] to-black h-[200px] w-[480px] left-[200px] -rotate-45 z-20"></div>
                    <div class="absolute bg-gradient-to-r from-black to-[#ED1B24] h-[240px] w-[480px] left-[790px] -rotate-45 z-20"></div>
                </div>
            </div>

            <div class="flex justify-center mt-8">
                <div x-data="{ open: false }" class="relative flex-1 font-poppins flex justify-center">
                    {{-- Trigger Button --}}
                    <button @click="open = true" class="bg-gradient-to-r from-[#ED1B24] to-[#C41118] hover:from-[#C41118] hover:to-[#ED1B24] text-white font-bold px-6 py-2.5 text-[12px] uppercase tracking-wider border-2 border-[#ED1B24] hover:border-[#FF2030] transition-all duration-200 flex items-center gap-2 w-[1120px] justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah pesanan
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
                                    Isi data untuk memesan
                                </h2>
                                <button @click="open = false" class="w-8 h-8 flex items-center justify-center border-2 border-zinc-700 hover:bg-zinc-800 hover:border-[#ED1B24] transition-all text-zinc-400 hover:text-white font-bold text-xl">×</button>
                            </div>

                            {{-- Modal Body --}}
                            <div class="p-6 max-h-[70vh] overflow-y-auto bg-gradient-to-b from-zinc-900 to-black">
                                <form action="addOrder" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    
                                    {{-- Row 1: Nama Produk & Harga --}}
                                    <div class="grid grid-cols-2 gap-3 mb-3">
                                        <div>
                                            <label for="durasi" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Durasi /hari</label>
                                            <input name="durasi" type="text" id="durasi" class="w-full px-4 py-2.5 bg-zinc-950 border-2 border-zinc-800 text-white text-sm focus:outline-none focus:border-[#ED1B24] transition-all placeholder:text-zinc-600" placeholder="Contoh: 1">
                                        </div>
                                        <div>
                                            <label for="alasan" class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Alasan</label>
                                            <input name="alasan" type="text" id="alasan" class="w-full px-4 py-2.5 bg-zinc-950 border-2 border-zinc-800 text-white text-sm focus:outline-none focus:border-[#ED1B24] transition-all placeholder:text-zinc-600" placeholder="contoh: acara keluarga">
                                        </div>
                                    </div>
                                    {{-- Total & Rekening --}}
                                    <div class="bg-zinc-950 border border-zinc-800 p-4 mb-4 rounded-md">
                                        
                                        <div class="flex justify-between items-center mb-3">
                                            <p class="text-xs font-bold text-zinc-400 uppercase tracking-widest">Total</p>
                                            <p class="text-sm font-semibold text-white">Rp. 98.766</p>
                                        </div>

                                        <div class="flex justify-between items-center">
                                            <p class="text-xs font-bold text-zinc-400 uppercase tracking-widest">BNI</p>
                                            <p class="text-sm font-semibold text-white">7644570</p>
                                        </div>
                                    </div>

                                    {{-- Upload Bukti Bayar --}}
                                    <div class="mb-4">
                                        <label class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">
                                            Upload bukti bayar
                                        </label>
                                        <input type="file" name="bukti_bayar"
                                            class="w-full px-4 py-3 bg-zinc-950 border-2 border-zinc-800 text-zinc-300 text-sm focus:outline-none focus:border-[#ED1B24] transition-all">
                                    </div>

                                    
                                    {{-- Hidden Field --}}
                                    <input type="hidden" name="penyewa_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="prod_id" value="{{$data->id}}">
                                    <input type="hidden" name="owner_id" value="{{$data->owner_id}}">

                                    {{-- Submit Button --}}
                                    <button type="submit" class="w-full bg-gradient-to-r from-[#ED1B24] to-[#C41118] hover:from-[#C41118] hover:to-[#ED1B24] text-white font-bold py-3.5 uppercase tracking-wider transition-all duration-200 border-t-2 border-[#FF2030] text-sm flex items-center justify-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        Pesan sekarang
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
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
            
        </div>
    </body>
</body>
</html>