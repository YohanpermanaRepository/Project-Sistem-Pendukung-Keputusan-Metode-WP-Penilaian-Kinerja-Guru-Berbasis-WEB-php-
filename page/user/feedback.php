<?php
// Koneksi ke database
include __DIR__ . '/../../lib/koneksi.php';

// Fungsi untuk mendapatkan data komentar dengan hak akses "guru"
function getComments() {
    global $conn;

    // Query untuk mengambil data komentar dengan hak akses "guru"
    $query = "SELECT nm_lengkap, komentar FROM admin WHERE hak_akses = 'guru'";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // Mengembalikan hasil query sebagai array assosiatif
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Mendapatkan data komentar dengan hak akses "guru" dari database
$comments = getComments();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Hak Akses Guru</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #e6e6e6;
        }
    </style>
</head>
<body>
    <h1>Admin Panel - Hak Akses Guru</h1>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Komentar</th>
        </tr>

        <?php
        // Menampilkan data komentar dengan penomoran
        $no = 1;
        foreach ($comments as $comment) {
            echo "<tr>";
            echo "<td>" . $no . "</td>";
            echo "<td>" . $comment['nm_lengkap'] . "</td>";
            echo "<td>" . $comment['komentar'] . "</td>";
            echo "</tr>";
            $no++;
        }
        ?>
    </table>
</body>
</html>
