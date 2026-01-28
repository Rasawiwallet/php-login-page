<?php
session_start();
include 'config.php';

$username = $_SESSION['username'];

$data = mysqli_query($conn,
    "SELECT * FROM reservasi 
     WHERE username='$username' 
     ORDER BY created_at DESC"
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Info Reservasi</title>
</head>
<body>

<h2>Info & Bukti Reservasi</h2>

<div class="info-container">
<?php while($row = mysqli_fetch_assoc($data)) { ?>
    <div class="info-card">
        <div class="icon">📄</div>

        <div class="info-text">
            <p class="tanggal">
                Dibuat: <?php echo date("d M Y", strtotime($row['created_at'])); ?>
            </p>
            <p>Kode: <?php echo $row['kode_reservasi']; ?></p>
        </div>

        <div class="info-action">
            <a href="bukti_card.php?kode=<?php echo $row['kode_reservasi']; ?>" target="_blank">
                Lihat Bukti
            </a>
        </div>
    </div>
<?php } ?>
</div>

</body>
</html>
