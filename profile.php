<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
</head>
<body>
    <h2>Profil User</h2>
    <p>Username: <?php echo $_SESSION['username']; ?></p>
    <a href="home.php">Kembali</a>
</body>
</html>
