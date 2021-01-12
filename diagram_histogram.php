<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js"></script>
    <style type="text/css">
        .diagram {
            width: 80%;
            margin: 15px auto;
        }
    </style>
</head>

<body>
    <div class="container diagram">
        <div class="grafik" width="20" height="20"></div>
    </div>
    <script type="text/javascript">
        $('.grafik').highcharts({
            chart: {
                type: 'column',
                marginTop: 80
            },
            credits: {
                enabled: false
            },
            tooltip: {
                shared: true,
                crosshairs: true,
                headerFormat: '<br></br>'
            },
            title: {
                text: 'Diagram Histogram'
            },
            xAxis: {
                categories: ["21 - 23", "24 - 26", "27 - 29", "30 - 32"],
                labels: {
                    rotation: 0,
                    align: 'right',
                    style: {
                        fontSize: '10px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            legend: {
                enabled: true
            },
            series: [{
                "name": "d. frekuensi",
                "data": [4, 8, 25, 10]
            }, {
                "name": "d. f. komulatif",
                "data": [4, 12, 37, 47]
            }, {
                "name": "d. f. relatif",
                "data": [0.09, 0.17, 0.53, 0.21]
            }, {
                "name": "d. f. relatif komulatif",
                "data": [0.09, 0.26, 0.79, 1.00]
            }, ]
        });
    </script>
</body>

</html>