
<?php
// Koneksi ke database
include 'C:/xampp/htdocs/PA SPK/Kelompok14/lib/koneksi.php';


// Fungsi untuk mendapatkan komentar berdasarkan username pengguna
function getCommentByUsername($username) {
    global $conn;

    // Query untuk mengambil komentar berdasarkan username pengguna
    $query = "SELECT komentar FROM admin WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Mengembalikan hasil query sebagai array assosiatif
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Fungsi untuk memperbarui komentar berdasarkan username pengguna
function updateCommentByUsername($username, $comment) {
    global $conn;

    // Query untuk memperbarui komentar berdasarkan username pengguna
    $query = "UPDATE admin SET komentar = :comment WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
}

// Fungsi untuk memeriksa apakah pengguna sudah login
function isUserLoggedIn() {
    return isset($_SESSION['loggedInUsername']);
}

// Mengarahkan pengguna ke halaman login jika belum login
function redirectToLogin() {
    header("Location: login.php");
    exit();
}

// Mendapatkan username pengguna yang sedang login
function getLoggedInUsername() {
    return $_SESSION['loggedInUsername'];
}

// Memeriksa apakah pengguna sudah login
session_start();
if (!isUserLoggedIn()) {
    redirectToLogin();
}

// Mendapatkan username pengguna yang sedang login
$loggedInUsername = getLoggedInUsername();

// Mendapatkan komentar pengguna yang sedang login
$commentData = getCommentByUsername($loggedInUsername);

// Memproses aksi logout
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    redirectToLogin();
}

// Memproses aksi simpan komentar
if (isset($_POST['submit'])) {
    $comment = $_POST['comment'];

    // Memanggil fungsi updateCommentByUsername untuk memperbarui komentar berdasarkan username pengguna yang sedang login
    updateCommentByUsername($loggedInUsername, $comment);

    // Redirect atau tampilkan pesan sukses
    header("Location: indexguru.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guru</title>
</head>
<body>
    <h1>Selamat datang bapak/ibu guru</h1>

    <h3>Komentar Anda:</h3>
    <form action="indexguru.php" method="POST">
        <textarea name="comment" rows="5" cols="40"><?php echo $commentData['komentar']; ?></textarea>
        <br>
        <input type="submit" name="submit" value="Simpan Komentar">
    </form>

    <form action="indexguru.php" method="POST">
        <input type="hidden" name="logout" value="1">
        <input type="submit" value="Logout">
    </form>
</body>

<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f5f5f5;
  padding: 20px;
}

h3 {
  color: #333;
  margin-bottom: 20px;
}

form {
  margin-top: 20px;
}

textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  resize: vertical;
  font-family: Arial, sans-serif;
  margin-bottom: 30px;
}

input[type="submit"] {
  padding: 10px 20px;
  background-color: #19A7CE;
  border: none;
  color: #fff;
  border-radius: 5px;
  cursor: pointer;
  font-family: Arial, sans-serif;
}

input[type="submit"]:hover {
  background-color: #333;
}

input[type="hidden"] {
  display: none;
}

form:last-child {
  margin-top: 10px;
}

form:last-child input[type="submit"] {
  background-color: #19A7CE;
}

form:last-child input[type="submit"]:hover {
  background-color: #19A7CE;
}

</style>

</html>


<html>
<head>
    <title>Guru</title>
</head>

<?php
require("controller/Kriteria.php");

$kriteria = Index("SELECT * FROM kriteria");
$alternatif = Index("SELECT * FROM alternatif");
$bobot = Index("SELECT * FROM pembobotan");
$maxkriteria = Index("SELECT SUM(bobot) AS Total FROM kriteria");
$test = [];
$varV = [];
$totalS = 0;
?>


<link rel="stylesheet" href="../asset/css/styleviewnilai.css">

<section class="section">
    <div class="container">
        <div class="row">
            <div class="columns">
                <div class="column">
                    <div class="card animate__animated animate__zoomIn">
                        <div class="card-header">
                            <p class="card-header-title">Table penilaian</p>
                        </div>
                        <div class="card-content">
                            <div class="table-container">
                                <table class="table is-fullwidth">
                                    <thead class="has-background-success">
                                        <tr>
                                            <th class="has-text-white">No</th>
                                            <th class="has-text-white">Alternatif</th>
                                            <?php foreach ($kriteria as $header) : ?>
                                                <th class="has-text-white"><?= $header["nm_kriteria"] ?></th>
                                            <?php endforeach ?>
                                        </tr>
                                    </thead>
                                    <tfoot class="has-background-success">
                                        <tr>
                                            <th class="has-text-white">No</th>
                                            <th class="has-text-white">Alternatif</th>
                                            <?php foreach ($kriteria as $header) : ?>
                                                <th class="has-text-white"><?= $header["nm_kriteria"] ?></th>
                                            <?php endforeach ?>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $a = 1 ?>
                                        <?php foreach ($alternatif as $row) : ?>
                                            <tr>
                                                <th><?= $a++ ?></th>
                                                <td><?= $row["nm_guru"] ?></td>
                                                <?php foreach ($bobot as $pembobot) : ?>
                                                    <?php if ($pembobot["id_guru"] == $row["id_guru"]) : ?>
                                                        <td><?= $pembobot["nilai"] ?></td>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div class="hidden">                               
                            <!-- BAGIAN -->
                            <h4 class="subtitle">Bagian 1 : Mencari Nilai W</h4>
                            <hr>
                            <p>Bobot Tiap Kriteria :</p>
                            <p>W = [
                                <?php foreach ($kriteria as $tampildoang) : ?>
                                    <?= $tampildoang["bobot"] . "," ?>
                                <?php endforeach ?>
                                ]
                            </p>
                            <hr>
                            <p>Pembobotan :</p>
                            <?php $b = 1 ?>
                            <?php foreach ($kriteria as $bagibobot) : ?>
                                <?php foreach ($maxkriteria as $TotalLah) : ?>
                                    <p>W<?= $b++ ?> =
                                        <?= $bagibobot["bobot"] . "/" . $TotalLah["Total"] ?> = <?= round($bagibobot["bobot"] / $TotalLah["Total"], 3) ?>
                                    </p>
                                <?php endforeach ?>
                            <?php endforeach ?>
                            <hr>
                            <p>Normalisasi Berdasarkan Pembobotan :</p>
                            <?php $c = 1 ?>
                            <?php foreach ($kriteria as $bagibobot) : ?>
                                <?php foreach ($maxkriteria as $TotalLah) : ?>
                                    <p>W<?= $c++ ?> =
                                        <?php if ($bagibobot["status"] == "COST") : ?>
                                            <?= round($bagibobot["bobot"] / $TotalLah["Total"], 3) * -1 ?></p>
                                <?php else : ?>
                                    <?= round($bagibobot["bobot"] / $TotalLah["Total"], 3) ?></p>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endforeach ?>
                        <hr>

                        <!-- BAGIAN 2 -->
                        <h4 class="subtitle">Bagian 2 : Mencari Nilai Vector (S)</h4>
                        <p>Pembobotan :</p>
                        <?php $d = 1 ?>
                        <?php $e = 0 ?>
                        <?php foreach ($alternatif as $guru) : ?>
                            <?php $idguru = $guru["id_guru"] ?>
                            <?php $bobot = Index("SELECT * FROM pembobotan WHERE id_guru = $idguru"); ?>
                            <?php $test[$e] = 1 ?>
                            S<?= $d++ ?> =
                            <?php foreach ($bobot as $pembobot) : ?>
                                <?php $idbobot = $pembobot["id_kriteria"] ?>
                                <?php $kriteria = Index("SELECT * FROM kriteria WHERE id_kriteria = $idbobot"); ?>
                                <?php foreach ($kriteria as $bagibobot) : ?>
                                    <?php $maxkriteria = Index("SELECT SUM(bobot) AS Total FROM kriteria"); ?>
                                    <?php foreach ($maxkriteria as $TotalLah) : ?>
                                        <?php if ($bagibobot["status"] == "COST") : ?>
                                            (<?= $pembobot["nilai"] . "<sup>" . round($bagibobot["bobot"] / $TotalLah["Total"], 3) * -1 . "</sup>" ?>)
                                            <?php $test[$e] = $test[$e] * pow($pembobot["nilai"], round($bagibobot["bobot"] / $TotalLah["Total"], 3) * -1) ?>
                                        <?php else : ?>
                                            (<?= $pembobot["nilai"] . "<sup>" . round($bagibobot["bobot"] / $TotalLah["Total"], 3) . "</sup>" ?>)
                                            <?php $test[$e] = $test[$e] * pow($pembobot["nilai"], round($bagibobot["bobot"] / $TotalLah["Total"], 3)) ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                <?php endforeach ?>
                            <?php endforeach ?>
                            =
                            <?= round($test[$e], 3) ?>
                            <?php $totalS = $totalS + $test[$e] ?>
                            <?php $e++ ?>
                            <br>
                        <?php endforeach ?>
                        <hr>
                        <h4 class="subtitle">Bagian 3 : Mencari Nilai V (V)</h4>
                        <?php $f = 1 ?>
                        <?php $g = 0 ?>
                        <?php foreach ($test as $row) : ?>
                            <p>V<?= $f++ ?> = <?= round($test[$g], 3) . "/" . round($totalS, 3) ?>
                                = <?= round(round($test[$g], 3) / round($totalS, 3), 3) ?></p>
                            <?php $g++ ?>
                        <?php endforeach ?>
                        <hr>
                        </div> 

                    
                        <h4 class="subtitle">Hasil</h4>
                            <div class="table-container">
                                <table id="myTable" class="table is-fullwidth">
                                    <thead class="has-background-success">
                                        <tr>
                                            <th class="has-text-white">No</th>
                                            <th class="has-text-white">Alternatif</th>
                                            <th class="has-text-white">Nilai</th>
                                            <th class="has-text-white">Rank</th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <button onclick="sortTable(0, 'asc')">↑</button>
                                                <button onclick="sortTable(0, 'desc')">↓</button>
                                            </th>
                                            <th>
                                                <button onclick="sortTable(1, 'asc')">↑</button>
                                                <button onclick="sortTable(1, 'desc')">↓</button>
                                            </th>
                                            <th>
                                                <button onclick="sortTable(2, 'asc')">↑</button>
                                                <button onclick="sortTable(2, 'desc')">↓</button>
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="has-background-success">
                                        <tr>
                                            <th class="has-text-white">No</th>
                                            <th class="has-text-white">Alternatif</th>
                                            <th class="has-text-white">Nilai</th>
                                            <th class="has-text-white">Rank</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $h = 1;
                                        $i = 0;
                                        $j = 0;
                                        $rank = 1;
                                        $prevValue = null;
                                        $sortedData = array();

                                        foreach ($alternatif as $row) {
                                            $varV[$j] = 1;
                                            $varV[$j] = $test[$i] / $totalS;

                                            // Menyimpan data dalam array untuk pengurutan
                                            $sortedData[] = array(
                                                'nama' => $row["nm_guru"],
                                                'nilai' => round($test[$i], 3) / round($totalS, 3)
                                            );

                                            $i++;
                                            $j++;
                                        }

                                        // Mengurutkan data berdasarkan nilai secara descending
                                        usort($sortedData, function ($a, $b) {
                                            return $b['nilai'] <=> $a['nilai'];
                                        });

                                        foreach ($sortedData as $data) {
                                            // Mengupdate peringkat jika nilai saat ini tidak sama dengan nilai sebelumnya
                                            if ($data['nilai'] !== $prevValue) {
                                                $rank = $h;
                                            }
                                        ?>
                                        <tr>
                                            <th><?= sprintf('%02d', $h++) ?></th>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= number_format($data['nilai'], 3) ?></td>
                                            <td><?= $rank ?></td>
                                        </tr>
                                        <?php
                                            $prevValue = $data['nilai'];
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .hidden{
        display: none;
    }
    .section {
  padding: 20px;
}

.container {
  max-width: 960px;
  margin: 0 auto;
}

.columns {
  display: flex;
  flex-wrap: wrap;
}

.column {
  flex: 1;
  padding: 10px;
}

.card {
  background-color: #f1f1f1;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  padding: 20px;
}

.card-header {
  background-color: #333;
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px 5px 0 0;
}

.card-header h2 {
  font-size: 24px;
  margin: 0;
}

.card-header-title {
  font-size: 18px;
  margin: 0;
}

.table-container {
  overflow-x: auto;
}

.table {
  width: 100%;
  border-collapse: collapse;
}

.table th,
.table td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ccc;
}

.has-background-success {
  background-color: #19A7CE;
}

.has-text-white {
  color: #fff;
}

.animate__animated {
  animation-duration: 1s;
}

.animate__zoomIn {
  animation-name: zoomIn;
}

@keyframes zoomIn {
  from {
    opacity: 0;
    transform: scale(0.5);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}

hr {
  margin: 20px 0;
  border: 0;
  border-top: 1px solid #ccc;
}

</style>

<script>
    function sortTable(columnIndex, order) {
        var table = document.getElementById("myTable");
        var tbody = table.getElementsByTagName("tbody")[0];
        var rows = Array.from(tbody.rows);

        rows.sort(function(a, b) {
            var aValue = a.cells[columnIndex].innerHTML.toLowerCase();
            var bValue = b.cells[columnIndex].innerHTML.toLowerCase();

            if (order === 'asc') {
                return aValue.localeCompare(bValue);
            } else {
                return bValue.localeCompare(aValue);
            }
        });

        // Hapus konten tabel
        while (tbody.firstChild) {
            tbody.removeChild(tbody.firstChild);
        }

        // Tambahkan kembali baris sesuai urutan yang diurutkan
        rows.forEach(function(row) {
            tbody.appendChild(row);
        });
    }
</script>
