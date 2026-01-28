<?php
include 'config.php';
$kode = $_GET['kode'];

$data = mysqli_query($conn,
    "SELECT * FROM reservasi WHERE kode_reservasi='$kode'"
);
$row = mysqli_fetch_assoc($data);
?>

<h2>Bukti Reservasi</h2>

<p><b>Kode:</b> <?php echo $row['kode_reservasi']; ?></p>
<p><b>Nama:</b> <?php echo $row['username']; ?></p>
<p><b>Tanggal:</b> <?php echo $row['tanggal']; ?></p>
<p><b>Jam:</b> <?php echo $row['jam']; ?></p>
<p><b>Meja:</b> <?php echo $row['meja']; ?></p>

<hr>

<p>
Silakan tunjukkan bukti reservasi ini kepada kasir atau pelayan.
Pembayaran dilakukan setelah selesai menggunakan meja.
</p>

<a href="home.php" class="btn-back">
    ← Kembali ke Home
</a>
