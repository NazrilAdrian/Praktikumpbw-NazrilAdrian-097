<?php include 'nav.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Pelanggan</title>
</head>
<body>
<div class="container mt-4">
    <h2>Tambah Pelanggan</h2>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-info"><?= htmlspecialchars($_GET['message']) ?></div>
    <?php endif; ?>

    <form method="post" action="proses_tambah_pelanggan.php">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Pelanggan</button>
        <a href="transaksi.php" class="btn btn-secondary">Kembali ke Transaksi</a>
    </form>
</div>
</body>
</html>
