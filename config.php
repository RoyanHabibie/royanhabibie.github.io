<?php
$host = 'royanhabibie.my.id';
$db = 'royanhab_if';
$usr = 'royanhab_if';
$pwd = '1nformatika';

// parameter = hostname, username, password, database
$conn = mysqli_connect($host, $usr, $pwd, $db); //true|false

if (!$conn) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
