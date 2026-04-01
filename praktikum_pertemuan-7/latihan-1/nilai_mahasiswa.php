<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan Nilai Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Nilai Mahasiswa</h2>
    <form method="post" action="">
        <label>Nama:
            <input type="text" name="nama" required>
        </label>
        <label>Nilai:
            <input type="number" name="nilai" min="0" max="100" required>
        </label>
        <input type="submit" value="Proses">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = htmlspecialchars($_POST['nama']);
        $nilai = (int)$_POST['nilai'];
        $predikat = "";
        $status = "";

        if ($nilai >= 85 && $nilai <= 100) {
            $predikat = "A";
            $status = "Lulus";
        } elseif ($nilai >= 75 && $nilai <= 84) {
            $predikat = "B";
            $status = "Lulus";
        } elseif ($nilai >= 65 && $nilai <= 74) {
            $predikat = "C";
            $status = "Lulus";
        } elseif ($nilai >= 50 && $nilai <= 64) {
            $predikat = "D";
            $status = "Lulus";
        } elseif ($nilai >= 0 && $nilai <= 49) {
            $predikat = "E";
            $status = "Gagal";
        } else {
            $predikat = "Tidak valid";
            $status = "-";
        }
        echo "<div class='result'><strong>Hasil:</strong><br>";
        echo "Nama : $nama<br>";
        echo "Nilai : $nilai<br>";
        echo "Predikat : $predikat<br>";
        echo "Status : $status</div>";
    }
    ?>
</div>
</body>
</html>
