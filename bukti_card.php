<?php
include 'config.php';
$kode = $_GET['kode'];

$data = mysqli_query($conn,
    "SELECT * FROM reservasi WHERE kode_reservasi='$kode'"
);
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Bukti Reservasi</title>

<style>
body {
    font-family: Arial;
    background: #f4f4f4;
}

.bukti {
    width: 350px;
    margin: 40px auto;
    background: white;
    padding: 20px;
    border-radius: 12px;
    text-align: center;
}

.kode {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
}
</style>
</head>

<body>

<div class="bukti" id="bukti">
    <h3>Bukti Reservasi</h3>
    <div class="kode"><?php echo $row['kode_reservasi']; ?></div>

    <p>Nama: <?php echo $row['username']; ?></p>
    <p>Tanggal Reservasi: <?php echo $row['tanggal']; ?></p>
    <p>Jam: <?php echo $row['jam']; ?></p>
    <p>Meja: <?php echo $row['meja']; ?></p>

    <hr>
    <p>Bayar di tempat setelah selesai</p>
</div>

<button onclick="download()">Simpan PNG / JPG</button>

<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
<script>
function download() {
    html2canvas(document.getElementById("bukti")).then(canvas => {
        let link = document.createElement("a");
        link.download = "bukti_reservasi.png";
        link.href = canvas.toDataURL("image/png");
        link.click();
    });
}
</script>

<a href="home.php" class="btn-back">
    ← Kembali ke Home
</a>

</body>
</html>
