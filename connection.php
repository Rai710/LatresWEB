<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "bioskop";
$port     = 3306;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $connection = new mysqli($hostname, $username, $password, $database, $port);
    $connection->set_charset("utf8mb4");

} catch (mysqli_sql_exception $e) {
    die("Koneksi gagal: " . $e->getMessage());
}