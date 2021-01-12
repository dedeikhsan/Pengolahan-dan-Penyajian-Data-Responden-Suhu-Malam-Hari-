<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_suhu");

$data_suhu = mysqli_query($koneksi, "SELECT data_suhu FROM penyajiandata ORDER BY id_tbl asc");
$d_frekuensi = mysqli_query($koneksi, "SELECT d_frekuensi FROM penyajiandata ORDER BY id_tbl asc");
$d_f_komulatif = mysqli_query($koneksi, "SELECT d_f_komulatif FROM penyajiandata ORDER BY id_tbl asc");
$d_f_relatif = mysqli_query($koneksi, "SELECT d_f_relatif FROM penyajiandata ORDER BY id_tbl asc");
$d_f_relatif_komulatif = mysqli_query($koneksi, "SELECT d_f_relatf_komulatif FROM penyajiandata ORDER BY id_tbl asc");

?>

<!doctype html>
<html lang="en" id="home">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/Chart.js"></script>
    <style type="text/css">
        .diagram {
            width: 100%;
            margin: 15px auto;
        }
    </style>

    <title>Data Suhu</title>
</head>
<div class="container diagram">
    <canvas id="diagram_ogive" width="20" height="20"></canvas>
</div>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        var ctx = document.getElementById("diagram_ogive").getContext("2d");
        var data = {
            labels: [<?php while ($p = mysqli_fetch_assoc($data_suhu)) {
                            echo '"' . $p['data_suhu'] . '",';
                        } ?>],
            datasets: [{
                    label: "d_frekuensi",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#29B0D0",
                    borderColor: "#29B0D0",
                    pointHoverBackgroundColor: "#29B0D0",
                    pointHoverBorderColor: "#29B0D0",
                    data: [<?php while ($p = mysqli_fetch_assoc($d_frekuensi)) {
                                echo '"' . $p['d_frekuensi'] . '",';
                            } ?>]
                },
                {
                    label: "d_f_komulatif",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#2A516E",
                    borderColor: "#2A516E",
                    pointHoverBackgroundColor: "#2A516E",
                    pointHoverBorderColor: "#2A516E",
                    data: [<?php while ($p = mysqli_fetch_assoc($d_f_komulatif)) {
                                echo '"' . $p['d_f_komulatif'] . '",';
                            } ?>]
                },
                {
                    label: "d_f_relatif",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#F07124",
                    borderColor: "#F07124",
                    pointHoverBackgroundColor: "#F07124",
                    pointHoverBorderColor: "#F07124",
                    data: [0.09, 0.17, 0.53, 0.21]
                },
                {
                    label: "d_f_relatif_komulatif",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#CBE0E3",
                    borderColor: "#CBE0E3",
                    pointHoverBackgroundColor: "#CBE0E3",
                    pointHoverBorderColor: "#CBE0E3",
                    data: [0.09, 0.26, 0.79, 1.00]
                },
            ]
        };

        var myBarChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                legend: {
                    display: true
                },
                barValueSpacing: 20,
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>