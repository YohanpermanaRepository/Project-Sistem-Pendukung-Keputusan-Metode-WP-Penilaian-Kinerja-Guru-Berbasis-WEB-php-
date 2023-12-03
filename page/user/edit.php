<?php
include include 'C:/xampp/htdocs/PA SPK/Kelompok14/lib/koneksi.php';


// Fungsi untuk mendapatkan data admin berdasarkan ID
function getAdminById($id_admin)
{
    global $conn;
    $sql = "SELECT * FROM admin WHERE id_admin = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_admin]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    return $admin;
}

// Fungsi untuk mengupdate data admin berdasarkan ID
function updateAdmin($id_admin, $nip, $nm_lengkap, $jenis_kelamin, $no_telp, $alamat, $username, $password, $hak_akses)
{
    global $conn;
    $sql = "UPDATE admin SET nip = ?, nm_lengkap = ?, jenis_kelamin = ?, no_telp = ?, alamat = ?, username = ?, password = ?, hak_akses = ? WHERE id_admin = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nip, $nm_lengkap, $jenis_kelamin, $no_telp, $alamat, $username, $password, $hak_akses, $id_admin]);
}

// Memproses form update admin
if (isset($_POST['update_admin'])) {
    $id_admin = $_POST['id_admin'];
    $nip = $_POST['nip'];
    $nm_lengkap = $_POST['nm_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];

    updateAdmin($id_admin, $nip, $nm_lengkap, $jenis_kelamin, $no_telp, $alamat, $username, $password, $hak_akses);

    header("Location: user.php");
    exit;
}

// Mendapatkan data admin berdasarkan ID yang diterima dari halaman sebelumnya
if (isset($_POST['id_admin'])) {
    $id_admin = $_POST['id_admin'];
    $admin = getAdminById($id_admin);
} else {
    // Jika tidak ada ID yang diterima, kembali ke halaman utama
    header("Location: user.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Guru</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
        }

        .container form {
            margin-top: 20px;
        }

        .container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .container input[type="text"],
        .container input[type="password"],
        .container select,
        .container textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .container input[type="submit"] {
            background-color:  #3273dc;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .container input[type="submit"]:hover {
            background-color: #000;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Data Guru</h2>

        <form method="POST">
            <input type="hidden" name="id_admin" value="<?php echo $admin['id_admin']; ?>">
            <label for="nip">NIP:</label>
            <input type="text" id="nip" name="nip" placeholder="NIP" value="<?php echo $admin['nip']; ?>" required>

            <label for="nm_lengkap">Nama Lengkap:</label>
            <input type="text" id="nm_lengkap" name="nm_lengkap" placeholder="Nama Lengkap"
                value="<?php echo $admin['nm_lengkap']; ?>" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin">
                <option value="Laki_Laki" <?php if ($admin['jenis_kelamin'] === 'Laki_Laki') echo 'selected'; ?>>Laki-Laki</option>
                <option value="Perempuan" <?php if ($admin['jenis_kelamin'] === 'Perempuan') echo 'selected'; ?>>Perempuan</option>
            </select>

            <label for="no_telp">Nomor Telepon:</label>
            <input type="text" id="no_telp" name="no_telp" placeholder="Nomor Telepon"
                value="<?php echo $admin['no_telp']; ?>" required>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" placeholder="Alamat" required><?php echo $admin['alamat']; ?></textarea>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Username"
                value="<?php echo $admin['username']; ?>" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password"
                value="<?php echo $admin['password']; ?>" required>

            <label for="hak_akses">Hak Akses:</label>
            <select id="hak_akses" name="hak_akses">
                <option value="guru" <?php if ($admin['hak_akses'] === 'guru') echo 'selected'; ?>>guru</option>
                <option value="admin" <?php if ($admin['hak_akses'] === 'admin') echo 'selected'; ?>>admin</option>
            </select>

            <input type="submit" name="update_admin" value="Update">
        </form>
    </div>
</body>

</html>
