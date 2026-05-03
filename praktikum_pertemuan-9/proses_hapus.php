<?php
include 'koneksi_db.php'; // Pastikan $conn = new mysqli(...)

$redirect_target = 'hapus_buku.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Siapkan query DELETE dengan prepared statement
    $stmt = $conn->prepare("DELETE FROM Buku WHERE ID = ?");
    $stmt->bind_param("i", $id); // "i" menandakan tipe data integer

    // Eksekusi dan tangani hasilnya
    if ($stmt->execute()) {
        header("Location: $redirect_target?message=" . urlencode("Data berhasil dihapus."));
        exit;
    } else {
        header("Location: $redirect_target?message=" . urlencode("Gagal menghapus data: " . $stmt->error));
        exit;
    }

    // Tutup statement
    $stmt->close();
} else {
    header("Location: $redirect_target?message=" . urlencode("ID tidak valid."));
    exit;
}

// Tutup koneksi
$conn->close();
?>
