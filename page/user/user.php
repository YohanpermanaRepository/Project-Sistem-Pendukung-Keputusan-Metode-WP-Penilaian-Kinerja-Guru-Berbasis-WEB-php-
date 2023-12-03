<?php
// Koneksi ke database
include 'C:/xampp/htdocs/PA SPK/Kelompok14/lib/koneksi.php';


// Fungsi untuk mendapatkan data komentar berdasarkan hak_akses kepala_sekolah
function getComments() {
    global $conn;

    // Query untuk mengambil data komentar
    $query = "SELECT * FROM admin WHERE hak_akses = 'kepala_sekolah'";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // Mengembalikan hasil query sebagai array associative
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fungsi untuk mengupdate komentar berdasarkan ID
function updateComment($id, $comment) {
    global $conn;

    // Query untuk mengupdate komentar berdasarkan ID
    $query = "UPDATE admin SET komentar = :comment WHERE id_admin = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

// Menangani aksi update komentar
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $comment = $_POST['comment'];

    // Memanggil fungsi updateComment untuk mengupdate komentar
    updateComment($id, $comment);

    // Redirect atau tampilkan pesan sukses
    header("Location: {$_SERVER['REQUEST_URI']}");
    exit();
}

// Mendapatkan data komentar dari database
$comments = getComments();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ccc;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    input[type="text"] {
        padding: 8px;
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 8px 16px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>




<body>
    <table>
        <tr>
            <th>Kode Akses untuk Guru</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($comments as $comment) { ?>
            <tr>
                <td>
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $comment['id_admin']; ?>">
                        <input type="text" name="comment" value="<?php echo $comment['komentar']; ?>">
                </td>
                <td>
                    <input type="submit" name="update" value="Update">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>









<?php
include 'C:/xampp/htdocs/PA SPK/Kelompok14/lib/koneksi.php';


// Fungsi untuk mendapatkan data dari tabel "admin"
function getAdminData()
{
    global $conn;
    $sql = "SELECT * FROM admin";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $adminData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $adminData;
}

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

// Fungsi untuk menambahkan data ke tabel "admin"
function addAdmin($nip, $nm_lengkap, $jenis_kelamin, $no_telp, $alamat, $username, $password, $hak_akses)
{
    global $conn;
    $sql = "INSERT INTO admin (nip, nm_lengkap, jenis_kelamin, no_telp, alamat, username, password, hak_akses) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nip, $nm_lengkap, $jenis_kelamin, $no_telp, $alamat, $username, $password, $hak_akses]);

    echo "<script>alert('Data guru berhasil ditambahkan.');</script>";
}

// Fungsi untuk menghapus data dari tabel "admin"
function deleteAdmin($id_admin)
{
    global $conn;
    $sql = "DELETE FROM admin WHERE id_admin = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_admin]);

    echo "<script>alert('Data guru berhasil dihapus.');</script>";
}

// Fungsi untuk mengubah data di tabel "admin"
function updateAdmin($id_admin, $nip, $nm_lengkap, $jenis_kelamin, $no_telp, $alamat, $username, $password, $hak_akses)
{
    global $conn;
    $sql = "UPDATE admin SET nip=?, nm_lengkap=?, jenis_kelamin=?, no_telp=?, alamat=?, username=?, password=?, hak_akses=? WHERE id_admin = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nip, $nm_lengkap, $jenis_kelamin, $no_telp, $alamat, $username, $password, $hak_akses, $id_admin]);

    echo "<script>alert('Data admin berhasil diupdate.');</script>";
}

// Memproses form tambah admin
if (isset($_POST['tambah_admin'])) {
    $nip = $_POST['nip'];
    $nm_lengkap = $_POST['nm_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];

    addAdmin($nip, $nm_lengkap, $jenis_kelamin, $no_telp, $alamat, $username, $password, $hak_akses);
}

// Memproses form hapus admin
if (isset($_POST['hapus_admin'])) {
    $id_admin = $_POST['id_admin'];

    deleteAdmin($id_admin);
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
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #ff4a4a;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color:#19A7CE;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        form.inline-form {
            display: inline;
        }

        .frame-background {
            background-image: url('path/to/background-image.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            padding: 20px;
        }
    </style>
</head>




<body>
    <div class="frame-background">
        <h2>Kelola Akses User</h2>

        <form method="POST">
            <input type="text" name="nip" placeholder="NIP" required>
            <input type="text" name="nm_lengkap" placeholder="Nama Lengkap" required>
            <select name="jenis_kelamin">
                <option value="Laki_Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>

            </select>
            <input type="text" name="no_telp" placeholder="Nomor Telepon" required>
            <textarea name="alamat" placeholder="Alamat" required></textarea>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="hak_akses" placeholder="Hak Akses" required>
            <input type="submit" name="tambah_admin" value="Tambah Admin">

        </form>

        <table>
            <tr>
                <th>ID Admin</th>
                <th>NIP</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>Username</th>
                <th>Password</th>
                <th>Hak Akses</th>
                <th>Action</th>
            </tr>

            <?php
            $adminData = getAdminData();
            foreach ($adminData as $admin) {
                echo "<tr>";
                echo "<td>" . $admin['id_admin'] . "</td>";
                echo "<td>" . $admin['nip'] . "</td>";
                echo "<td>" . $admin['nm_lengkap'] . "</td>";
                echo "<td>" . $admin['jenis_kelamin'] . "</td>";
                echo "<td>" . $admin['no_telp'] . "</td>";
                echo "<td>" . $admin['alamat'] . "</td>";
                echo "<td>" . $admin['username'] . "</td>";
                echo "<td>" . $admin['password'] . "</td>";
                echo "<td>" . $admin['hak_akses'] . "</td>";
                echo "<td>
                        <form method='POST' action='user/edit.php' class='inline-form'>
                            <input type='hidden' name='id_admin' value='" . $admin['id_admin'] . "'>
                            <input type='submit' name='edit_admin' value='Edit'>
                        </form>
                        <form method='POST' class='inline-form'>
                            <input type='hidden' name='id_admin' value='" . $admin['id_admin'] . "'>
                            <input type='submit' name='hapus_admin' value='Hapus'>
                        </form>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>




    










</body>

</html>
