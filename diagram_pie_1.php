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
            width: 80%;
            margin: 15px auto;
        }
    </style>

    <title>Data Suhu</title>
</head>
<div class="container diagram">
    <canvas id="d_frekuensi" width="20" height="20"></canvas>
</div>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        var ctx = document.getElementById("d_frekuensi").getContext("2d");
        var data = {
            labels: ["21-23", "24-26", "27-29", "30-32"],
            datasets: [{
                label: "d_frekuensi",
                data: [
                    4, 8, 25, 10
                ],

                backgroundColor: [
                    '#29B0D0',
                    '#2A516E',
                    '#F07124',
                    '#CBE0E3',
                    '#979193'
                ]
            }]
        };

        var myBarChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                responsive: true
            }
        });
    </script>
</body>

</html>