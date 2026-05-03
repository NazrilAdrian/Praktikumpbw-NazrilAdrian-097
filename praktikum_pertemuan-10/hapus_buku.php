<?php
session_start();

if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("Mengakses fitur harus login dulu bro."));
    exit;
}

include 'koneksi_db.php';
include 'nav.php';

$buku_result = $conn->query("SELECT ID, Judul, Penulis, Tahun_Terbit, Harga FROM Buku ORDER BY ID DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Hapus Buku</title>
</head>
<body>
<div class="container mt-4">
    <h2>Hapus Buku</h2>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-info"><?= htmlspecialchars($_GET['message']) ?></div>
    <?php endif; ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($buku_result && $buku_result->num_rows > 0): ?>
                <?php while ($row = $buku_result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['ID'] ?></td>
                    <td><?= htmlspecialchars($row['Judul']) ?></td>
                    <td><?= htmlspecialchars($row['Penulis']) ?></td>
                    <td><?= $row['Tahun_Terbit'] ?></td>
                    <td>Rp<?= number_format($row['Harga'], 2) ?></td>
                    <td>
                        <a href="proses_hapus.php?id=<?= $row['ID'] ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Data buku tidak ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
