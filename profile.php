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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Profil</title>
</head>
<body>

<?php include 'navbar.php'; ?>

    <h2>Profil User</h2>
    <p>Username: <?php echo $_SESSION['username']; ?></p>
    <a href="home.php">Kembali</a>

<script src="navbar.js"></script>

</body>
</html>
