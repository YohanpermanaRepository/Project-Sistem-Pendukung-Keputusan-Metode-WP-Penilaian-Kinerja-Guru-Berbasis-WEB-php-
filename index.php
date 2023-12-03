<?php
require("../controller/Login.php");

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK</title>
    <link rel="stylesheet" href="../asset/css/styling2.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>

    <div class="fontnya">
            <!-- NAVBAR -->
    <nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
        <div class="container1">
            <div class="navbar-brand">

                <a class="navbarjudul">
                    <h3 class="title">SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN GURU TERBAIK BERDASARKAN NILAI KINERJA </h3>
                </a>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="NavbarUtama">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="NavbarUtama" class="navbar-menu">
                <div class="navbar-end">
                    <a class="navbar-item" href="index.php?halaman=home">Home</a>
                    <a class="navbar-item" href="index.php?halaman=kelola_user">Kelola data User</a>
                    <a class="navbar-item" href="index.php?halaman=datales">Kelola Guru</a>
                    <a class="navbar-item" href="index.php?halaman=datakriteria">Data Kriteria</a>
                    <a class="navbar-item" href="index.php?halaman=tabelrange">Rank Penilaian</a>
                    <a class="navbar-item" href="index.php?halaman=databobot">Penilaian</a>
                    <a class="navbar-item" href="index.php?halaman=datapenilaian">Hasil</a>
                    <a class="navbar-item" href="index.php?halaman=komen">Komentar Guru</a>
                    
                    <div class="navbar-item">
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- AKHIR NAVBAR -->


    </div>

    <!-- HALAMAN -->
    <?php require '../controller/Menu.php' ?>
    <!-- AKHIR HALAMAN -->

    <!-- JAVASCRIPT -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>



    <footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3 class="footer-title">Tentang Kami</h3>
            <p>Tim pengembang sistem pendukung keputusan pemilihan guru terbaik berdasarkan kinerja di SMK 1 Kamal terdiri dari ahli IT dan pendidik yang berkomitmen meningkatkan kualitas pendidikan di Indonesia.
            Sistem ini menggunakan data kinerja dan prestasi guru dari berbagai sumber, dianalisis menggunakan algoritma dan metode pemilihan yang akurat dan adil, dengan harapan dapat membantu memperbaiki kualitas pendidikan di SMK 1 Kamal dan seluruh Indonesia.</p>
        </div>


        <div class="footer-section">
            <div class="dev">
                <h3 class="footer-title">Developer</h3>
                <ul>
                    <li><a href="#">Muhammad Kurniawan Dwi Hariyadi</a></li>
                    <li><a href="#">Yohan Permana</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-section">
            <div calss="kontak">
                <h3 class="footer-title">Kontak Kami</h3>
                <ul>
                    <li>Jln Raya Telang No.03 Kamal</li>
                    <li>Bangkalan, Madura, Indonesia</li>
                    <li>smkn1_kamal@yaoo.co.id</li>
                    <li>(031) 51160739 </li>
                </ul>
            </div>
        </div>
    </div>



</footer>
<style>
    /* CSS untuk footer */
    footer {
        background-color: #333;
        color: #fff;
        bottom: 0;
        width: 100%;
        padding: 30px 0;
    }


    /* CSS untuk footer-container */
    .footer-container {
        display: flex;
        text-align: justify;
        flex-wrap: wrap;
    }

    /* CSS untuk footer-section */
    .footer-section {
        margin-left: 50px;
        flex-basis: 30%;
        margin-bottom: 30px;
    }

    .dev{
        margin-left: 140px;
    }


    /* CSS untuk footer-title */
    .footer-title {
        font-size: 24px;
        margin-bottom: 20px;
    }

    /* CSS untuk footer ul */
    .footer-section ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    /* CSS untuk footer li */
    .footer-section li {
        margin-bottom: 10px;
    }

    /* CSS untuk footer a */
    .footer-section a {
        color: #fff;
        text-decoration: none;
    }

    /* CSS untuk footer a:hover */
    .footer-section a:hover {
        text-decoration: underline;
    }
</style>


</body>
</html>