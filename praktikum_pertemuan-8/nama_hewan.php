<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nama Hewan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'menu.php'; ?>

    <div class="container">
        <h2>Nama Hewan</h2>

        <form method="POST">
        <label for="hewan">Masukkan daftar nama hewan (pisahkan dengan koma):</label>
        <input type="text" name="hewan" id="hewan" placeholder="Contoh: Ayam, Monyet, Anjing, Babi,..." required>
        <button type="submit">Tampilkan</button>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hewan'])) {
            $inputHewan = trim($_POST['hewan']);

        if ($inputHewan === '') {
            echo "<div class='hasil'><p>Input tidak boleh kosong.</p></div>";
        } else {
    
        $daftarHewan = array_map('trim', explode(',', $inputHewan));

            echo "<div class='hasil'>";
            echo "<p>Daftar hewan yang dimasukkan:</p>";
            echo "<ul>";
        foreach ($daftarHewan as $hewan) {
            echo "<li><strong>" . htmlspecialchars($hewan) . "</strong></li>";
        }
        echo "</ul>";
        echo "</div>";
        }
    }
    ?>
</div>

</body>
</html>