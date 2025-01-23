<!DOCTYPE html>
<html>
<head>
    <title>Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Input Pembelian</h1>
        @if(session('success'))
            <p class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</p>
        @endif
        @if(session('error'))
            <p class="bg-red-100 text-red-700 p-2 rounded mb-4">{{ session('error') }}</p>
        @endif
        <form action="/pembelian" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="kasir_id" class="block text-sm font-medium text-gray-700">Nama Barang:</label>
                <select name="kasir_id" id="kasir_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    <option value="">Pilih Barang</option>
                    @foreach($items as $item)
                        <option value="{{ $item->id }}" data-harga="{{ $item->harga }}" data-stok="{{ $item->stok }}">{{ $item->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah:</label>
                <input type="number" id="jumlah" name="jumlah" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                <p id="stok-warning" class="text-red-500 mt-2 hidden">Jumlah pembelian melebihi stok yang tersedia!</p>
            </div>
            <div>
                <label for="harga_total" class="block text-sm font-medium text-gray-700">Harga Total:</label>
                <input type="text" id="harga_total" name="harga_total" readonly class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md">Simpan</button>
        </form>
        <br>
        <a href="/pembelian/report" class="text-blue-500 hover:underline">Laporan Pembelian</a>
    </div>

    <script>
        document.getElementById('kasir_id').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var harga = selectedOption.getAttribute('data-harga');
            var stok = selectedOption.getAttribute('data-stok');
            var jumlah = document.getElementById('jumlah').value;
            document.getElementById('harga_total').value = harga * jumlah;
            checkStock(jumlah, stok);
        });

        document.getElementById('jumlah').addEventListener('input', function() {
            var harga = document.getElementById('kasir_id').options[document.getElementById('kasir_id').selectedIndex].getAttribute('data-harga');
            var stok = document.getElementById('kasir_id').options[document.getElementById('kasir_id').selectedIndex].getAttribute('data-stok');
            document.getElementById('harga_total').value = harga * this.value;
            checkStock(this.value, stok);
        });

        function checkStock(jumlah, stok) {
            if (parseInt(jumlah) > parseInt(stok)) {
                document.getElementById('stok-warning').classList.remove('hidden');
            } else {
                document.getElementById('stok-warning').classList.add('hidden');
            }
        }
    </script>
</body>
</html>
