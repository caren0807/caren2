<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagram Lingkaran</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 300px; /* Ukuran lebar canvas */
            height: 300px; /* Ukuran tinggi canvas */
            margin: 40px auto; /* Agar diagram berada di tengah */
        }
    </style>
</head>

<body>

    <h1 style="text-align: center;">Distribusi Barang Dipinjam Per Hari</h1>
    <div class="chart-container">
        <canvas id="perHariChart"></canvas>
    </div>

    <h1 style="text-align: center;">Distribusi Barang Dipinjam Per Bulan</h1>
    <div class="chart-container">
        <canvas id="perBulanChart"></canvas>
    </div>

    <h1 style="text-align: center;">Distribusi Barang Dipinjam Per Tahun</h1>
    <div class="chart-container">
        <canvas id="perTahunChart"></canvas>
    </div>

    <?php
    // Koneksi ke database
    include "koneksi.php";

    // Fungsi untuk menangani kesalahan
    function handleQueryError($connection, $query) {
        if (!$query) {
            die("Query gagal: " . $connection->error);
        }
    }

    // Ambil data per hari
    $queryHari = "
        SELECT DAYOFWEEK(tanggal_pinjam) as day_num, DAYNAME(tanggal_pinjam) as day_name, SUM(jumlah_barang) as total
        FROM transaksi_jember
        GROUP BY DAYOFWEEK(tanggal_pinjam), DAYNAME(tanggal_pinjam)
        ORDER BY DAYOFWEEK(tanggal_pinjam)
    ";
    $resultHari = $koneksi->query($queryHari);
    handleQueryError($koneksi, $resultHari);

    $hariLabels = [];
    $hariData = [];
    while ($row = $resultHari->fetch_assoc()) {
        $hariLabels[] = $row['day_name'];
        $hariData[] = $row['total'];
    }

    // Ambil data per bulan
    $queryBulan = "
        SELECT MONTH(tanggal_pinjam) as month_num, MONTHNAME(tanggal_pinjam) as month_name, SUM(jumlah_barang) as total
        FROM transaksi_jember
        GROUP BY MONTH(tanggal_pinjam), MONTHNAME(tanggal_pinjam)
        ORDER BY MONTH(tanggal_pinjam)
    ";
    $resultBulan = $koneksi->query($queryBulan);
    handleQueryError($koneksi, $resultBulan);

    $bulanLabels = [];
    $bulanData = [];
    while ($row = $resultBulan->fetch_assoc()) {
        $bulanLabels[] = $row['month_name'];
        $bulanData[] = $row['total'];
    }

    // Ambil data per tahun
    $queryTahun = "
        SELECT YEAR(tanggal_pinjam) as year, SUM(jumlah_barang) as total
        FROM transaksi_jember
        GROUP BY YEAR(tanggal_pinjam)
        ORDER BY YEAR(tanggal_pinjam)
    ";
    $resultTahun = $koneksi->query($queryTahun);
    handleQueryError($koneksi, $resultTahun);

    $tahunLabels = [];
    $tahunData = [];
    while ($row = $resultTahun->fetch_assoc()) {
        $tahunLabels[] = $row['year'];
        $tahunData[] = $row['total'];
    }

    $koneksi->close();
    ?>

    <script>
        // Data per hari
        var perHariCtx = document.getElementById('perHariChart').getContext('2d');
        var perHariChart = new Chart(perHariCtx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($hariLabels); ?>,
                datasets: [{
                    data: <?php echo json_encode($hariData); ?>,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#FF5722', '#4CAF50', '#9C27B0', '#3F51B5'].slice(0, <?php echo count($hariData); ?>),
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });

        // Data per bulan
        var perBulanCtx = document.getElementById('perBulanChart').getContext('2d');
        var perBulanChart = new Chart(perBulanCtx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($bulanLabels); ?>,
                datasets: [{
                    data: <?php echo json_encode($bulanData); ?>,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#FF5722', '#4CAF50', '#9C27B0', '#3F51B5', '#FFEB3B', '#009688', '#795548', '#607D8B', '#E91E63'].slice(0, <?php echo count($bulanData); ?>),
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });

        // Data per tahun
        var perTahunCtx = document.getElementById('perTahunChart').getContext('2d');
        var perTahunChart = new Chart(perTahunCtx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($tahunLabels); ?>,
                datasets: [{
                    data: <?php echo json_encode($tahunData); ?>,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#FF5722', '#4CAF50', '#9C27B0'].slice(0, <?php echo count($tahunData); ?>),
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>

</body>

</html>
