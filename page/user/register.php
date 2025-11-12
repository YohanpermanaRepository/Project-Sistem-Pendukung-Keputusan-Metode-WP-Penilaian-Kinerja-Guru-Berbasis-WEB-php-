<?php
include __DIR__ . '/../../lib/koneksi.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nm_lengkap = $_POST['nm_lengkap'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_ulang = $_POST['password_ulang'];
    $komentar = $_POST['komentar'];

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
        $sql = "INSERT INTO admin (nm_lengkap, username, password, hak_akses) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nm_lengkap, $username, $hashed_password, "guru"]);

        echo "Registrasi berhasil. Silakan login.";
        exit;
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Registrasi</title>
</head>

<body>
        <h2 class="judul">Registrasi</h2>

        <?php if (!empty($errors)): ?>
            <div class="error-message">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="container">
        <form method="POST">
            <div>
                <label>Nama Lengkap:</label>
                <input type="text" name="nm_lengkap" required>
            </div>
            <div>
                <label>Username:</label>
                <input type="text" name="username" required>
            </div>
            <div>
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label>Ulangi Password:</label>
                <input type="password" name="password_ulang" required>
            </div>
            <div>
                <label>Kode Token:</label>
                <input type="text" name="komentar" required>
            </div>
            <div>
                <input type="submit" value="Register">
            </div>
        </form>
    </div>
</body>

<style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        width: 300px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f7f7f7;
    }

    .judul {
        text-align: center;
    }

    .error-message {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        margin-bottom: 10px;
    }

    form label {
        display: block;
        margin-bottom: 5px;
    }

    form input[type="text"],
    form input[type="password"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    form input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    form input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

</html>




