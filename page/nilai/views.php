<?php
require("../controller/Kriteria.php");

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