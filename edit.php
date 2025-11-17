<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'connection.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id_lama = $_GET['id']; 

$sql = "SELECT * FROM film WHERE id_film = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $id_lama);
$stmt->execute();
$result = $stmt->get_result();
$film = $result->fetch_assoc();

if (!$film) {
    echo "Data film tidak ditemukan!";
    exit();
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_baru = $_POST['id'];   
    $judul = $_POST['judul'];
    $sutradara = $_POST['sutradara'];
    $harga = $_POST['harga'];

    $update = "UPDATE film SET id_film = ?, judul_film = ?, sutradara = ?, harga_tiket = ? 
               WHERE id_film = ?";
    $stmt2 = $connection->prepare($update);
    $stmt2->bind_param("issii", $id_baru, $judul, $sutradara, $harga, $id_lama);

    if ($stmt2->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Gagal mengupdate data!');</script>";
    }
}
?>

    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Film</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow">

            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Edit Film</h5>
                <small>Ubah data film yang dipilih</small>
            </div>

            <div class="card-body">

                <form method="POST">

                    <label>ID Film</label>
                    <input type="number" name="id" class="form-control mb-3" value="<?= $film['id_film'] ?>" required>
                    <label>Judul Film</label>
                    <input type="text" name="judul" class="form-control mb-3" value="<?= $film['judul_film'] ?>" required>

                    <label>Sutradara</label>
                    <input type="text" name="sutradara" class="form-control mb-3" value="<?= $film['sutradara'] ?>" required>

                    <label>Harga Tiket (Rp)</label>
                    <input type="number" name="harga" class="form-control mb-4" value="<?= $film['harga_tiket'] ?>" required>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>

                </form>

            </div>

        </div>
    </div>

    </body>
    </html>
