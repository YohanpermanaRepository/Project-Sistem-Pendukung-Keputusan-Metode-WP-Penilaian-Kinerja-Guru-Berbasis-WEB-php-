<?php
include_once("../controller/Les.php");

$halaman = 5;
$hasil = count(Index("SELECT * FROM alternatif"));
$total = ceil($hasil / $halaman);
$aktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awal = ($halaman * $aktif) - $halaman;

$data = Index("SELECT * FROM alternatif LIMIT $awal,$halaman");
?>

<link rel="stylesheet" href="../asset/css/styleviewles.css">


<section class="section">
    <div class="container">
        <div class="row">
            <div class="columns">
                <div class="column">
                    <div class="card animate__animated animate__zoomIn">
                        <div class="card-header">
                            <p class="card-header-title">Alternatif data Guru</p>
                            <div class="buttons card-header-icon">
                                <a class="button is-link" href="index.php?halaman=tambahdatales">
                                    <ion-icon name="add-circle" class="mr-2"></ion-icon>Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-container">
                                <table class="table is-fullwidth">
                                    <thead class="has-background-success">
                                        <tr>
                                            <th class="has-text-white">No</th>
                                            <th class="has-text-white">NIP</th>
                                            <th class="has-text-white">Nama Guru</th>
                                            <th class="has-text-white">Kelola Data Guru apabila ingin hapus/edit</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="has-background-success has-text-white">
                                        <tr>
                                            <th class="has-text-white">No</th>
                                            <th class="has-text-white">NIP</th>
                                            <th class="has-text-white">Nama Guru</th>
                                            <th class="has-text-white">Kelola Data Guru apabila ingin hapus/edit</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1 + $awal ?>
                                        <?php foreach ($data as $row) : ?>
                                            <tr>
                                                <th><?= $i ?></th>
                                                <td><?= $row["kode_alternatif"] ?></td>
                                                <td><?= $row["nm_guru"] ?></td>
                                                <td>
                                                    <div class="buttons">
                                                        <a class="button is-link" href="index.php?halaman=editdatales&id=<?= $row['id_guru']; ?>">
                                                            <ion-icon name="create"></ion-icon>
                                                        </a>
                                                        <button class="button is-danger" onclick="DeleteData()">
                                                            <ion-icon name="trash"></ion-icon>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>

                            <?php require '../controller/PaginationAlternative.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







<script>


    // proses hapus
    function DeleteData() {
        // event.preventDefault(); // prevent form submit
        Swal.fire({
            title: 'Yakin mau hapus data ini?',
            text: "kalo sudah dihapus, tidak bisa dibalikin ya!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#276CDA',
            cancelButtonColor: '#F03A5F',
            confirmButtonText: 'Iya, hapus aja',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "index.php?halaman=hapusdatales&id=<?= $row['id_guru']; ?>";
            }
        })
    }
</script>