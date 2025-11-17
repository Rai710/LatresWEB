<?php
include "connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    try{
        $sql = "INSERT INTO users (nama_lengkap, username, password) values (?,?,?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sss", $name, $username, $password);

        if($stmt->execute()){
            header("Location: login.php");
            exit();
        } else {
            echo "Gagal mendaftar. silakan coba lagi.";
        }
    } catch (mysqli_sql_exception $e){
        echo "pendaftaran gagal: " . $e->getMessage();
    }

    $stmt->close();
    $connection->close();
}
?>