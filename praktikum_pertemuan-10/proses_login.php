<?php
session_start();
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$columns = $conn->query("SHOW COLUMNS FROM pengguna");
if (!$columns) {
    die("Tabel pengguna tidak ditemukan di database hosting.");
}

$password_column = null;
while ($col = $columns->fetch_assoc()) {
    if ($col['Field'] === 'password') {
        $password_column = 'password';
        break;
    }
    if ($col['Field'] === 'kata_sandi') {
        $password_column = 'kata_sandi';
    }
}

if ($password_column === null) {
    die("Kolom password/kata_sandi tidak ditemukan di tabel pengguna.");
}

$stmt = $conn->prepare("SELECT id, nama, $password_column FROM pengguna WHERE nama = ? AND $password_column = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $_SESSION['id'] = $user['id'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['login_Un51k4'] = true;

    header("Location: index.php");
    exit;
}

header("Location: login.php?message=" . urlencode("password salah bro..."));
exit;
