<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'connection.php';


$query = "SELECT * FROM film";
$result = mysqli_query($connection, $query);


$total = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Film Bioskop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Manajemen Film Bioskop</h4>
            <p>Selamat datang, <b><?= $_SESSION['username']; ?></b> | 
            <a href="logout.php">Logout</a></p>
        </div>

        <div class="card-body">

            <a href="tambah.php" class="btn btn-success mb-3">Tambah Film</a>

            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Judul Film</th>
                        <th>Sutradara</th>
                        <th>Harga Tiket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "<tr>
                                <td>{$row['id_film']}</td>
                                <td>{$row['judul_film']}</td>
                                <td>{$row['sutradara']}</td>
                                <td>Rp " . number_format($row['harga_tiket'], 0, ',', '.') . "</td>
                                <td>
                                    <a href='edit.php?id={$row['id_film']}'>Edit</a> |
                                    <a href='hapus.php?id={$row['id_film']}'
                                    onclick=\"return confirm('Yakin hapus film ini?')\">Hapus</a>
                                </td>
                            </tr>";

                        $total += $row['harga_tiket'];
                    }
                    ?>

                </tbody>

                <tfoot>
                    <tr class="table-secondary">
                        <th colspan="3">Total Harga Tiket</th>
                        <th colspan="2">Rp <?= number_format($total, 0, ',', '.'); ?></th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>

</body>
</html>
