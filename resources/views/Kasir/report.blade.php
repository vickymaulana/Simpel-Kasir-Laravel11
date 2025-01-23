<!DOCTYPE html>
<html>
<head>
    <title>Laporan Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Laporan Barang</h1>
        <canvas id="reportChart" width="400" height="200"></canvas>
        <br>
        <a href="/kasir" class="text-blue-500 hover:underline">Kembali</a>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('reportChart').getContext('2d');
            var reportChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($items->pluck('nama_barang')),
                    datasets: [{
                        label: 'Stok',
                        data: @json($items->pluck('stok')),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
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
