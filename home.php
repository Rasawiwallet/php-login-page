<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reservasi Meja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Reservasi Meja Restoran</h2>

<form action="process_reservasi.php" method="POST">
    <label>Tanggal Reservasi</label>
    <input type="date" name="tanggal" required>

    <label>Jam</label>
    <input type="time" name="jam" required>

    <h3>Pilih Meja</h3>

    <div class="meja-container">
        <!-- Meja pakai gambar -->
        <input type="radio" name="meja" id="meja1" value="M1" hidden>
        <label for="meja1" class="meja">
            <img src="assets/meja.png">
            <span>Meja 1</span>
        </label>

        <input type="radio" name="meja" id="meja2" value="M2" hidden>
        <label for="meja2" class="meja">
            <img src="assets/meja.png">
            <span>Meja 2</span>
        </label>

        <input type="radio" name="meja" id="meja3" value="M3" hidden>
        <label for="meja3" class="meja">
            <img src="assets/meja.png">
            <span>Meja 3</span>
        </label>
    </div>

    <button type="submit">Lanjutkan Reservasi</button>
</form>

<p class="info">
    * Pembayaran dilakukan di restoran setelah makan selesai.
</p>

</body>
</html>
