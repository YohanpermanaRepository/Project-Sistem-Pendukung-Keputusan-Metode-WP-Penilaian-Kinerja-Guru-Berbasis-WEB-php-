<?php
// Koneksi ke database
include 'C:/xampp/htdocs/PA SPK/Kelompok14/lib/koneksi.php';


// Fungsi untuk melakukan proses login
function login($username, $password) {
    global $conn;

    // Query untuk memeriksa username dan password
    $query = "SELECT username, hak_akses FROM admin WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    // Mengembalikan data pengguna jika login berhasil, atau false jika gagal
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Memproses aksi login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Memanggil fungsi login untuk memeriksa kredensial
    $userData = login($username, $password);

    // Jika login berhasil, simpan username dan hak akses pengguna ke dalam session
    if ($userData) {
        session_start();
        $_SESSION['loggedInUsername'] = $userData['username'];
        $_SESSION['loggedInUserRole'] = $userData['hak_akses'];

        // Redirect pengguna ke halaman yang sesuai berdasarkan hak akses
        if ($userData['hak_akses'] === 'guru') {
            header("Location: indexguru.php");
        } else {
            header("Location: page/index.php");
        }
        exit();
    } else {
        $loginError = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>


<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #19A7CE;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .container {
            background-color: #fff;
            border-radius: 4px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        form {
            display: flex;
            flex-direction: column;
        }
        
        label {
            margin-bottom: 5px;
        }
        
        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        
        input[type="submit"] {
            padding: 10px;
            background-color: #19A7CE;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        p.error-message {
            color: red;
            margin-top: 10px;
        }
        .login-link {
            text-align: center;
            font-size: 14px;
            margin-top: 10px; /* Tambahkan margin-bottom */
        }

        .login-link a {
            color: #19A7CE;
            text-decoration: none;
        }
    </style>
    <title>Login</title>
</head>
<body>
<div class="container">
        <h1>Login Guru</h1>

        <?php if (isset($loginError)) { ?>
            <p class="error-message"><?php echo $loginError; ?></p>
        <?php } ?>

        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <br>
            <input type="submit" name="login" value="Login">
        </form>
        <div class="login-link">
            Belum punya akun? <a href="register.php">Daftar di sini</a>
        </div>
        
    </div>

    
</body>
</html>
