<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased bg-gray-50">
        <div class="flex flex-col justify-center items-center min-h-screen">
            <div class="bg-white rounded-xl shadow-sm p-6 w-[420px] border border-gray-100">
                <h2 class="text-xl font-semibold text-gray-800 mb-6 text-center">Tambah Produk</h2>
                <form action="/stored-product" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="produk" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                        <input name="produk" type="text" id="produk" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    </div>
                    <div class="mb-4">
                        <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                        <input name="harga" type="text" id="harga" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    </div>
                    <div class="mb-4">
                        <label for="jumlah_durasi" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Durasi</label>
                        <input name="jumlah_durasi" type="text" id="jumlah_durasi" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    </div>
                    <div class="mb-6">
                        <label for="satuan" class="block text-sm font-medium text-gray-700 mb-1">Satuan</label>
                        <input name="satuan" type="text" id="satuan" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    </div>
                    <div class="mb-6">
                        <label for="plat" class="block text-sm font-medium text-gray-700 mb-1">plat</label>
                        <input name="plat" type="text" id="plat" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    </div>
                    <div class="mb-6">
                        <label for="minus" class="block text-sm font-medium text-gray-700 mb-1">minus</label>
                        <input name="minus" type="text" id="minus" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    </div>
                    <div class="mb-6">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">deskripsi</label>
                        <input name="desk" type="text" id="deskripsi" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    </div>
                    <div class="mb-6">
                        <input name="owner_id" type="hidden" value="{{ Auth::user()->id }}" id="owner_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Simpan Produk
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>