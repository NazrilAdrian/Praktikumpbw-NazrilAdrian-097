<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bilangan Genap</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'menu.php'; ?>

    <div class="container">
        <h2>Bilangan Genap</h2>

        <form method="POST">
            <label for="batas">Masukkan angka:</label>
            <input type="number" name="batas" id="batas" min="1" placeholder="Contoh: 2,4,6,8,..." required>
            <button type="submit">Tampilkan</button>
        </form>
    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['batas'])) {
        $batas = (int) $_POST['batas'];

        if ($batas < 2) {
            echo "<div class='hasil'><p>Batas minimal adalah 2.</p></div>";
        } else {
            echo "<div class='hasil'>";
            echo "<p>Bilangan genap dari <strong>2 - </strong><strong>$batas</strong>:</p>";
        for ($i = 2; $i <= $batas; $i += 2) {
            echo "<p>$i</p>";
        }
            echo "</div>";
        }
    }
    ?>
</div>

</body>
</html>