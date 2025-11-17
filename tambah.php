<?php
session_start();

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $sutradara = $_POST['sutradara'];
    $harga = $_POST['harga'];

    $sql = "INSERT INTO film (judul_film, sutradara, harga_tiket) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssi", $judul, $sutradara, $harga);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Gagal menyimpan data!');</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Film Baru</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">

        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Tambah Film Baru</h5>
            <small>Isi form untuk menambahkan film</small>
        </div>

        <div class="card-body">

            <form method="POST">

                <label>Judul Film</label>
                <input type="text" name="judul" class="form-control mb-3" required>

                <label>Sutradara</label>
                <input type="text" name="sutradara" class="form-control mb-3" required>

                <label>Harga Tiket (Rp)</label>
                <input type="number" name="harga" class="form-control mb-4" required>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>

            </form>

        </div>

    </div>
</div>

</body>
</html>
