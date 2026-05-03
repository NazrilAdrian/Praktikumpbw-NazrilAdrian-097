<?php
include 'koneksi_db.php'; // Koneksi database

// Query untuk menampilkan data pesanan beserta nama pelanggan dan total harga
$query = "
SELECT
    Pesanan.ID AS Pesanan_ID,
    Pelanggan.Nama AS Nama_Pelanggan,
    Pesanan.Tanggal_Pesanan,
    Pesanan.Total_Harga,
    GROUP_CONCAT(CONCAT(Buku.Judul, ' (x', Detail_Pesanan.Kuantitas, ')') SEPARATOR ', ') AS Buku_Dipesan
FROM Pesanan
JOIN Pelanggan ON Pesanan.Pelanggan_ID = Pelanggan.ID
LEFT JOIN Detail_Pesanan ON Detail_Pesanan.Pesanan_ID = Pesanan.ID
LEFT JOIN Buku ON Buku.ID = Detail_Pesanan.Buku_ID
GROUP BY Pesanan.ID, Pelanggan.Nama, Pesanan.Tanggal_Pesanan, Pesanan.Total_Harga
ORDER BY Pesanan.ID DESC
";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Daftar Pesanan</title>
</head>
<body>
<?php include 'nav.php' ?>
    <div class="container mt-4">
        <h2>Daftar Pesanan</h2>

        <!-- Tabel Daftar Pesanan -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Nama Pelanggan</th>
                    <th>Buku Dipesan</th>
                    <th>Tanggal Pesanan</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['Pesanan_ID'] ?></td>
                    <td><?= htmlspecialchars($row['Nama_Pelanggan']) ?></td>
                    <td><?= htmlspecialchars($row['Buku_Dipesan'] ?? '-') ?></td>
                    <td><?= $row['Tanggal_Pesanan'] ?></td>
                    <td>Rp<?= number_format($row['Total_Harga'], 2) ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
