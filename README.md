# php-login-page
Login Page dengan PHP

# create database login untuk menyimpan seluruh tabel
create database login

#eksekusi perintah berikut
CREATE TABLE `users` (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  PASSWORD VARCHAR(64) NOT NULL,
  PRIMARY KEY(id)
);
INSERT INTO `users` (`username`, `email`, `password`) VALUES ('admin', 'admin@email.com', SHA2('password', 256));

#buat file config.php sebagai berikut
<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "login";
$conn = mysqli_connect($server, $user, $pass, $database);
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?> 