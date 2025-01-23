<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Laporan Pembelian</h1>
        <form method="GET" action="/pembelian/report" class="mb-4">
            <div class="flex space-x-4">
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Mulai:</label>
                    <input type="date" id="start_date" name="start_date" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Akhir:</label>
                    <input type="date" id="end_date" name="end_date" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori:</label>
                    <select id="kategori" name="kategori" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Filter</button>
                </div>
            </div>
        </form>
        <canvas id="purchaseReportChart" width="400" height="200"></canvas>
        <br>
        <table class="min-w-full bg-white border border-gray-200 mt-4">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Nama Barang</th>
                    <th class="py-2 px-4 border-b">Jumlah</th>
                    <th class="py-2 px-4 border-b">Harga Total</th>
                    <th class="py-2 px-4 border-b">Tanggal Pembelian</th>
                    <th class="py-2 px-4 border-b">Jam Pembelian</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchases as $purchase)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $purchase->nama_barang }}</td>
                    <td class="py-2 px-4 border-b">{{ $purchase->jumlah }}</td>
                    <td class="py-2 px-4 border-b">{{ $purchase->harga_total }}</td>
                    <td class="py-2 px-4 border-b">{{ $purchase->tanggal_pembelian }}</td>
                    <td class="py-2 px-4 border-b">{{ $purchase->jam_pembelian }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <div class="text-xl font-bold">Total Pendapatan: {{ $totalRevenue }}</div>
        <br>
        <a href="/pembelian" class="text-blue-500 hover:underline">Kembali</a>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('purchaseReportChart').getContext('2d');
            var purchaseReportChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($purchases->pluck('nama_barang')),
                    datasets: [{
                        label: 'Jumlah',
                        data: @json($purchases->pluck('jumlah')),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
