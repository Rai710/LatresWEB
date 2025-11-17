<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }

        .container {
            width: 70%;
            margin: 40px auto;
            background: white;
            display: flex;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .left {
            width: 50%;
        }

        .left img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .right {
            width: 50%;
            padding: 40px;
        }

        h2 {
            margin-bottom: 5px;
        }

        p {
            margin-top: 0;
            color: gray;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            border: none;
            background:rgb(9, 0, 88);
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover {
            background: #0b5ed7;
        }

        .smalltext {
            font-size: 14px;
            margin-top: 10px;
        }

        a {
            color: #0d6efd;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }


    </style>
</head>
<body>

<div class="container">

    <div class="left">
        <img src="film.jpg" alt="Picture">
    </div>

    <!-- Form Kanan -->
    <div class="right">
            <form action = "daftarController.php" method ="POST">

                <h2>Login</h2>
                <p>Masukkan username dan password</p>
                
                <label>Nama Lengkap</label>
                <input type="text" name = "name" placeholder="Nama Lengkap anda">
                <label>Username</label>
                <input type="text" name = "username" placeholder="Username anda">
                <label>Password</label>
                <input type="password" name = "password" placeholder="Password anda">
                <label>Konfirmasi Password</label>
                <input type="password" placeholder="Password anda">

                <button type="submit">Login</button>

            </form>
            <div class="smalltext">
                Belum punya akun? <a href="#">Daftar di sini</a><br>
                Default admin / admin

            </div>
        </div>
    </div>
</div>

</body>
</html>
