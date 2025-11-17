<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "connection.php";


if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id_film = $_GET['id'];

$sql = "DELETE FROM film WHERE id_film = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $id_film);

if ($stmt->execute()) {
    header("Location: index.php");
    exit();
} else {
    echo "Gagal menghapus data!";
}

$stmt->close();
$connection->close();
?>
