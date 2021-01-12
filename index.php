<?php
//Memanggil Halaman
include "functions.php";

//konfigurasi pagination
$jumlahDataPerhalaman = 10;
$jumlahData = count(query("SELECT * FROM survey"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

//Menampilkan Data Tabel Responden dari Database
$survey = query("SELECT * FROM survey LIMIT $awalData, $jumlahDataPerhalaman");

//Menampilkan Data Tabel Penyajian Data dari Database
$penyajian_data = query("SELECT * FROM penyajiandata");

?>


<?php
//Dekklarasi Variabel Scope
$x = array(21, 21, 23, 23, 24, 24, 24, 24, 25, 26, 26, 26, 27, 27, 27, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 30, 30, 30, 30, 30, 30, 30, 31, 31, 32);
$jumlahX = array_sum($x);
$banyakX = count($x);

function mean()
{
    global $x;
    global $jumlahX;
    global $banyakX;
    $hasil = $jumlahX / $banyakX;

    return $hasil;
}

function median()
{
    global $x;
    global $jumlahX;
    global $banyakX;
    sort($x);

    $hasil = $banyakX / 2;
    if (gettype($hasil) == 'double') {
        $hasil = floor($hasil);
        $median = $x[$hasil];
    } else {
        $hasil = floor($hasil);
        $hasil1 = round($hasil);
        $median = ($x[$hasil] + $x[$hasil1]) / 2;
    }

    return $median;
}

function modus()
{
    global $x;
    $a = array_count_values($x);
    foreach ($a as $modus => $val) {
        if ($val == max($a)) {
            echo $modus;
        }
    }
}

function q1()
{
    global $x;
    global $jumlahX;
    global $banyakX;

    $kuartil1 = $x{
        ceil($banyakX / 4) - 1};

    return $kuartil1;
}

function q2()
{
    global $x;
    global $jumlahX;
    global $banyakX;

    $kuartil2 = $x{
        ceil($banyakX / 2) - 1};

    return $kuartil2;
}

function q3()
{
    global $x;
    global $jumlahX;
    global $banyakX;

    $kuartil3 = $x{
        ceil(3 * $banyakX / 4) - 1};

    return $kuartil3;
}

function varian()
{
    global $x;
    global $jumlahX;
    global $banyakX;

    $mean = $jumlahX / $banyakX;
    $xrata = 0;
    for ($i = 0; $i < $banyakX; $i++) {
        $xrata += pow(($x[$i] - $mean), 2);
    }
    $varian = ($xrata) / ($banyakX - 1);

    return $varian;
}

function std_dev()
{
    global $x;
    global $jumlahX;
    global $banyakX;

    $mean = $jumlahX / $banyakX;
    $xrata = 0;
    for ($i = 0; $i < $banyakX; $i++) {
        $xrata += pow(($x[$i] - $mean), 2);
    }
    $varian = ($xrata) / ($banyakX - 1);

    $std_dev = sqrt($varian);

    return $std_dev;
}

?>


<!doctype html>
<html lang="en" id="home">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Data Suhu</title>
</head>

<body>

    <!-- Navbar -->
    <div class="fixed-top" id="menu">
        <nav class=" navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#home">Coba.in</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link garis active" href="#home">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="#responden">Data Responden</a>
                        <a class="nav-item nav-link" href="#pengolahan-data">Pengolahan Data</a>
                        <a class="nav-item nav-link" href="#penyajian-data">Penyajian Data</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- End Navbar -->

    <!-- Tabel Data Responden -->
    <div class="responden" id="responden">
        <div class="container">
            <div class="row">
                <div class="col text-center button">
                    <h3 class="">Data Responden Survey Suhu Malam Hari</h3>
                    <hr>
                </div>
            </div>
            <ul class="pagination">
                <?php if ($halamanAktif > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>">Previous</a>
                    </li>
                <?php endif; ?>
                <?php if ($halamanAktif < $jumlahHalaman) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>">Next</a>
                    </li>
                <?php endif; ?>
            </ul>

            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
            <?php endfor; ?>

            <table class="table table-bordered ngakali">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Suhu</th>
                        <th>Kabupaten</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i = 1; ?>
                    <?php foreach ($survey as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['suhu']; ?></td>
                            <td><?= $row['kabupaten']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
    <!-- End Tabel Data Responden -->


    <!-- Pengolahan Data -->
    <section id="pengolahan-data">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="kotak">
                        <div class="imgBx">
                            <img src="assets/img/mean.png">
                        </div>
                        <div class="content">
                            <h4 class="sub-judul">Mean :</h4>
                            <p>
                                <?= mean(); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="kotak">
                        <div class="imgBx">
                            <img src="assets/img/median.png">
                        </div>
                        <div class="content">
                            <h4 class="sub-judul">Median :</h4>
                            <p>
                                <?= median(); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="kotak">
                        <div class="imgBx">
                            <img src="assets/img/modus.png">
                        </div>
                        <div class="content">
                            <h4 class="sub-judul">Modus :</h4>
                            <p>
                                <?= modus(); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="kotak">
                        <div class="imgBx">
                            <img src="assets/img/quartile.png">
                        </div>
                        <div class="content">
                            <h4 class="sub-judul">Quartile :</h4>
                            <p>
                                Q1 = <?= q1(); ?>, Q2 = <?= q2(); ?>, Q3 = <?= q3(); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="kotak">
                        <div class="imgBx">
                            <img src="assets/img/varian.png">
                        </div>
                        <div class="content">
                            <h4 class="sub-judul">Varian :</h4>
                            <p>
                                <?= varian(); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="kotak">
                        <div class="imgBx">
                            <img src="assets/img/standar-deviasi.png">
                        </div>
                        <div class="content">
                            <h4 class="sub-judul">Standar Deviasi :</h4>
                            <p>
                                <?= std_dev(); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Pengolahan Data -->

    <!-- Penyajian Data -->
    <div class="container mt-5">
        <div class="penyajian-data" id="penyajian-data">
            <h3 class="text-center"> Data Kelompok </h3>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Data Suhu</th>
                        <th>D. Frekuensi</th>
                        <th>D. F. Komulatif</th>
                        <th>D. F. Relatif</th>
                        <th>Presentase D. F. Relatif</th>
                        <th>D. F. R. Komulatif</th>
                        <th>Presentase D. F. R. Komulatif</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($penyajian_data as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['data_suhu']; ?></td>
                            <td><?= $row['d_frekuensi']; ?></td>
                            <td><?= $row['d_f_komulatif']; ?></td>
                            <td><?= $row['d_f_relatif']; ?></td>
                            <td><?= $row['presentase_d_f_relatif']; ?></td>
                            <td><?= $row['d_f_relatif_komulatif']; ?></td>
                            <td><?= $row['presentase_d_f_relatif_komulatif']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
    <!-- End Penyajian Data -->

    <div class="container mb-4">
        <div class="row">
            <div class="col">

            </div>
        </div>
    </div>

    <!-- Grafik Penyajian Data -->
    <div class="container">
        <div class="row grafik">
            <div class="col-md-6 mt-5">
                <h5 class="text-center">Diagram Histogram</h5>
                <?php include "diagram_histogram.php"; ?>
            </div>
            <div class="col-md-6 mt-5">
                <h5 class="text-center">D. Frekuensi</h5>
                <?php include "diagram_pie_1.php"; ?>
            </div>
            <div class="col-md-6 mt-5">
                <h5 class="text-center">D. F. Komulatif</h5>
                <?php include "diagram_pie_2.php"; ?>
            </div>
            <div class="col-md-6 mt-3">
                <h5 class="text-center">D. F. Relatif</h5>
                <?php include "diagram_pie_3.php"; ?>
            </div>
            <div class="col-md-6 mt-3">
                <h5 class="text-center">D. F. Relatif Komulatif</h5>
                <?php include "diagram_pie_4.php"; ?>
            </div>
            <div class="col-md-6 mt-3">
                <h5 class="text-center">Diagram Ogive</h5>
                <?php include "diagram_ogive.php"; ?>
            </div>
        </div>
    </div>

    <!-- End Grafik Penyajian Data -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/Chart.js"></script>
</body>

</html>