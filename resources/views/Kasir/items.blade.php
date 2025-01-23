<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Daftar Barang</h1>
        @if(session('success'))
            <p class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</p>
        @endif
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Nama Barang</th>
                    <th class="py-2 px-4 border-b">Harga</th>
                    <th class="py-2 px-4 border-b">Stok</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $item->nama_barang }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->harga }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->stok }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="/kasir/{{ $item->id }}/edit" class="bg-yellow-500 text-white p-2 rounded-md">Edit</a>
                        <form action="/kasir/{{ $item->id }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white p-2 rounded-md">Hapus</button>
                        </form>
                        <form action="/kasir/{{ $item->id }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <input type="number" name="stok" placeholder="Tambah Stok" class="p-2 border border-gray-300 rounded-md">
                            <button type="submit" class="bg-green-500 text-white p-2 rounded-md">Tambah</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <a href="/kasir" class="text-blue-500 hover:underline">Kembali</a>
    </div>
</body>
</html>
