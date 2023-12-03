<?php
require("../controller/Kriteria.php");

if (isset($_POST["add"])) {
    if (Add("kriteria", $_POST) > 0) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil masuk kedalam database',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
        </script>";
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data gagal masuk kedalam database',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then(function() {
            window.location.href = 'index.php?halaman=datakriteria';
        });
        </script>";
    }
}
?>

<link rel="stylesheet" href="../asset/css/addkriteria.css">
<section class="section">
    <div class="container">
        <div class="row">
            <div class="columns">
                <div class="column">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">Tambah Kriteria</p>
                            <div class="buttons card-header-icon">
                                <a class="button is-link" href="index.php?halaman=datakriteria">
                                    <ion-icon name="arrow-back-circle" class="mr-2"></ion-icon>Kembali
                                </a>
                            </div>
                            
                        </div>
                        <div class="card-content">
                            <form action="" method="post">
                                <div class="field">
                                    <label class="label">Kode Kriteria</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" placeholder="Masukkan Kode Kriteria" name="kode_kriteria">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Nama Kriteria</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" placeholder="Masukkan Nama Kriteria" name="nm_kriteria">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Bobot</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" placeholder="Masukkan Bobot Kriteria" name="bobot">
                                    </div>
                                </div>


                                <div class="field">
                                    <label class="label">Biaya/Keuntungan</label>
                                    <div class="control has-icons-left">
                                        <div class="select">
                                            <select name="status">
                                                <option selected disabled>Pilihan</option>
                                                <option value="COST">COST</option>
                                                <option value="BENEFIT">BENEFIT</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <button class="button is-link" type="submit" name="add">
                                        <ion-icon name="save" class="mr-2"></ion-icon>Simpan
                                    </button>
                                    <button class="button is-link" type="reset">
                                        <ion-icon name="refresh-circle" class="mr-2"></ion-icon>Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>