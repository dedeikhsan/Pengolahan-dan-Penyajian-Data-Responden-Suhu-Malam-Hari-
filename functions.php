<?php

//koneksi php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "db_suhu";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
    die("Koneksi Gagal !" . mysqli_connect_error());
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
