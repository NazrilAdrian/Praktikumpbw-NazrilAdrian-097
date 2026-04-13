<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Genap atauGanjil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'menu.php'; ?>

    <div class="container">
        <h2>Genap atau Ganjil</h2>

        <form method="POST">
        <label for="angka">Masukkan sebuah angka:</label>
        <input type="number" name="angka" id="angka" min="0" placeholder="Contoh:2,4,6,8,..." required>
        <button type="submit">Cek</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['angka'] !== '') {
        $angka = (int) $_POST['angka'];

        $status = ($angka % 2 == 0) ? "Genap" : "Ganjil";

        echo "<div class='hasil'>";
        echo "<p>Angka: <strong>$angka</strong></p>";
        echo "<p>Status: <strong>$status</strong></p>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>