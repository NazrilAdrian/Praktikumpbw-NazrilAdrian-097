<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>   
    <h2>Perhitungan Total Pembelian</h2>

    <?php
    $nama = "Laptop";
    $harga = 15000000;
    $jumlah = 1;

    $total = $harga * $jumlah;
    $pajak = $total * 0.1;
    $total_akhir = $total + $pajak;

    echo "Nama Barang: $nama <br>";
    echo "Harga Satuan: Rp $harga <br>";
    echo "Jumlah Beli: $jumlah";
    echo "Total Harga: Rp $total <br>";
    echo "Pajak (10%): Rp $pajak <br>";
    echo "<b>Total Bayar: Rp $total_akhir</b>";
    ?>
</body>
</html>