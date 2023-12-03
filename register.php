<?php
include 'C:/xampp/htdocs/PA SPK/Kelompok14/lib/koneksi.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nm_lengkap = $_POST['nm_lengkap'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_ulang = $_POST['password_ulang'];
    $komentar = $_POST['komentar'];
    $nip = $_POST['nip'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    // Validasi input
    $errors = array();
    if (empty($nm_lengkap)) {
        $errors[] = "Nama lengkap harus diisi";
    }
    if (empty($username)) {
        $errors[] = "Username harus diisi";
    }
    if (empty($password)) {
        $errors[] = "Password harus diisi";
    }
    if (empty($password_ulang)) {
        $errors[] = "Ulangi password harus diisi";
    }
    if ($password !== $password_ulang) {
        $errors[] = "Password tidak cocok";
    }
    if (empty($komentar)) {
        $errors[] = "Kode token harus diisi";
    }

    // Cek apakah kode token valid
    $valid_token = $_POST['komentar'];

    $sql = "SELECT COUNT(*) FROM admin WHERE komentar = ? AND hak_akses = 'kepala_sekolah'";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$valid_token]);
    $count = $stmt->fetchColumn();
    if ($count == 0) {
        $errors[] = "Kode token tidak valid";
    }
    
    if (empty($errors)) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Simpan data ke database
        $sql = "INSERT INTO admin (nm_lengkap, username, password, hak_akses, nip, jenis_kelamin, no_telp, alamat) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nm_lengkap, $username, $hashed_password, "guru", $nip, $jenis_kelamin, $no_telp, $alamat]);

        echo "Registrasi berhasil. Silakan login.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registrasi Guru</title>
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
            max-width: 400px;
            margin: 20px auto 0 auto; /* Tambahkan margin-top */
        }

        .judul {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        label {
            margin-bottom: 5px;
            color: #555;
            flex-basis: 100%;
        }

        input[type="text"],
        input[type="password"],
        textarea,
        select {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #19A7CE;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #333;
        }

        .error-message {
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 14px;
            flex-basis: 100%;
        }

        .login-link {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px; /* Tambahkan margin-bottom */
        }

        .login-link a {
            color: #19A7CE;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="judul">Registrasi Guru</h2>

        <?php if (!empty($errors)): ?>
            <div class="error-message">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST">
            <label>Nama Lengkap:</label>
            <input type="text" name="nm_lengkap" required>
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <label>Ulangi Password:</label>
            <input type="password" name="password_ulang" required>
            <label>NIP:</label>
            <input type="text" name="nip" required>
            <label>Jenis Kelamin:</label>
            <select name="jenis_kelamin" required>
                <option value="Laki_Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <label>No. Telepon:</label>
            <input type="text" name="no_telp">
            <label>Alamat:</label>
            <textarea name="alamat"></textarea>
            <label>Kode Token:</label>
            <input type="text" name="komentar" required>
            <input type="submit" value="Register">
        </form>

        <div class="login-link">
            Sudah punya akun? <a href="login.php">Login di sini</a>
        </div>
    </div>
</body>

</html>



