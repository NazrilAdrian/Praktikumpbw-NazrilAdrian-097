<?php
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');

    if ($nama === '') {
        header("Location: pelanggan.php?message=" . urlencode("Nama pelanggan wajib diisi."));
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO Pelanggan (Nama) VALUES (?)");
    $stmt->bind_param("s", $nama);

    if ($stmt->execute()) {
        header("Location: transaksi.php?message=" . urlencode("Pelanggan berhasil ditambahkan, silakan pilih pelanggan."));
        exit;
    }

    header("Location: pelanggan.php?message=" . urlencode("Gagal menambahkan pelanggan: " . $stmt->error));
    exit;
}

header("Location: pelanggan.php");
exit;
