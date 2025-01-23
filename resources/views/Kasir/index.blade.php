<!DOCTYPE html>
<html>
<head>
    <title>Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Input Barang</h1>
        @if(session('success'))
            <p class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</p>
        @endif
        <form action="/kasir" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama Barang:</label>
                <input type="text" id="nama_barang" name="nama_barang" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga:</label>
                <input type="number" id="harga" name="harga" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label for="stok" class="block text-sm font-medium text-gray-700">Stok:</label>
                <input type="number" id="stok" name="stok" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori:</label>
                <input type="text" id="kategori" name="kategori" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md">Simpan</button>
        </form>
        <br>
        <a href="/kasir/items" class="text-blue-500 hover:underline">Lihat Barang</a>
        <br>
        <a href="/kasir/report" class="text-blue-500 hover:underline">Laporan Barang</a>
    </div>
</body>
</html>
