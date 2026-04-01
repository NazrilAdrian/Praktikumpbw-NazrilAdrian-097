<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran UKT Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Pembayaran UKT Mahasiswa</h2>
    <form method="post" action="">
        <label>NPM:
            <input type="number" name="npm" required>
        </label>
        <label>Nama:
            <input type="text" name="nama" required>
        </label>
        <label>Prodi:
            <input type="text" name="prodi" required>
        </label>
        <label>Semester:
            <input type="number" name="semester" min="1" max="14" required>
        </label>
        <label>Biaya UKT (Rupiah):
            <input type="number" name="biaya_ukt" min="0" max="20000000" required>
        </label>
        <input type="submit" value="Hitung Diskon">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $npm = (int)($_POST['npm']);
        $nama = htmlspecialchars($_POST['nama']);
        $prodi = htmlspecialchars($_POST['prodi']);
        $semester = (int)$_POST['semester'];
        $biaya_ukt = (int)$_POST['biaya_ukt'];
        
        $persen_diskon = 0;
        
        // Logika diskon
        if ($biaya_ukt >= 5000000 && $semester > 8) {
            // Diskon 15% (10% + tambahan 5%)
            $persen_diskon = 15;
        } elseif ($biaya_ukt >= 5000000) {
            // Diskon 10%
            $persen_diskon = 10;
        }
        
        // Hitung besaran diskon dan yang harus dibayar
        $jumlah_diskon = ($persen_diskon / 100) * $biaya_ukt;
        $yang_harus_dibayar = $biaya_ukt - $jumlah_diskon;
        
        // Format rupiah
        $biaya_ukt_format = "Rp. " . number_format($biaya_ukt, 0, ',', '.');
        $diskon_format = "Rp. " . number_format($jumlah_diskon, 0, ',', '.');
        $bayar_format = "Rp. " . number_format($yang_harus_dibayar, 0, ',', '.');
        
        echo "<div class='result'>";
        echo "<strong>Hasil:</strong><br>";
        echo "NPM : $npm<br>";
        echo "NAMA : $nama<br>";
        echo "PRODI : $prodi<br>";
        echo "SEMESTER : $semester<br>";
        echo "BIAYA UKT : $biaya_ukt_format<br>";
        echo "DISKON : $persen_diskon% <br>";
        echo "JUMLAH DISKON : $diskon_format<br>";
        echo "YANG HARUS DIBAYAR : $bayar_format <br>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
