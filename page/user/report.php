<!DOCTYPE html>
<html>
<head>
  <title>Daftar Guru</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      border-radius: 4px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
      font-weight: 600;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #e3e8ff;
    }

    .empty-data {
      text-align: center;
      color: #999;
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Daftar Guru</h1>
    <table>
      <thead>
        <tr>
          <th>Nama Lengkap</th>
          <th>Komentar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Mengimpor file koneksi.php dengan menggunakan include
        include 'C:/xampp/htdocs/PA SPK/Kelompok14/lib/koneksi.php';


        // Query untuk mengambil data nama lengkap dan komentar dari tabel admin dengan hak_akses guru
        $sql = "SELECT nm_lengkap, komentar FROM admin WHERE hak_akses = 'guru'";
        $result = $conn->query($sql);

        // Memeriksa apakah ada hasil query
        if ($result->rowCount() > 0) {
            // Menampilkan data nama lengkap dan komentar
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["nm_lengkap"] . "</td>";
                echo "<td>" . $row["komentar"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2' class='empty-data'>Tidak ada data yang ditemukan.</td></tr>";
        }

        // Menutup koneksi ke database
        $conn = null;
        ?>
      </tbody>
    </table>
 
