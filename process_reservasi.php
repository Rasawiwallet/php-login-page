<?php
include 'config.php';
session_start();

$username = $_SESSION['username'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$meja = $_POST['meja'];

$kode = "RSV-" . strtoupper(substr(md5(time()),0,6));

$sql = "INSERT INTO reservasi (username, tanggal, jam, meja, kode_reservasi)
        VALUES ('$username','$tanggal','$jam','$meja','$kode')";

mysqli_query($conn, $sql);

header("Location: bukti_reservasi.php?kode=$kode");
exit();
