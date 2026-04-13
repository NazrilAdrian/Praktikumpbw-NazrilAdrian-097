<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenis Kendaraan</title>
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
    <?php include 'menu.php'; ?>

    <div class="container">
        <h2>Jenis Kendaraan</h2>

        <form method = "POST">
            <label for = "roda">Masukkan Jumlah Roda:</label>
            <input type = "number" name = "roda" id = "roda" min= "1" placeholder="Contoh: 2,3,4,6,10,12..." required>
            <button type = "submit">Cek Kendaraan</button>
        </form>


        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $jumlah_roda = (int) $_POST["roda"];
                $kendaraan = "";

                switch ($jumlah_roda) {
                    case 2:
                        $kendaraan = "Sepeda Motor";
                        break;
                    case 3:
                        $kendaraan = "Becak";
                        break;
                    case 4:
                        $kendaraan = "Mobil";
                        break;
                    case 6:
                        $kendaraan = "Bus Besar";
                        break;
                    case 10:
                        $kendaraan = "Truk Tronton";
                        break;
                    case 12:
                        $kendaraan = "Gondola";
                        break;
                    default:
                        $kendaraan = "Kendaraan Tidak Dikenal";
                }
                
                echo "<div class = 'hasil'>";
                echo "<p>Jumlah Roda: <strong>$jumlah_roda</strong></p>";
                echo "<p>Jumlah Kendaraan: <strong>$kendaraan</strong></p>";
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>