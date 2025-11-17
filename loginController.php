<?php
    include 'connection.php';
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    try{
        $sql = "SELECT id_user, username, password, nama_lengkap FROM users Where username = ? limit 3";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows){
            $row = $result->fetch_assoc();

            if($password == $row['password']){
                $_SESSION['username'] = $row['username'];
                header("Location: index.php");
                exit();

            };
        }else {
        echo "Username tidak ditemukan.";
    }

    $stmt->close();

    }catch(mysqli_sql_exception $e){
        echo "Login gagal : " . $e->getMessage();
    }
?>