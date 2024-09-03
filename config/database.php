<?php
$host = "localhost"; // Sesuaikan dengan konfigurasi server MySQL-mu
$dbname = "pelatihan";
$username = "root"; // Sesuaikan dengan username MySQL-mu
$password = "tegar"; // Sesuaikan dengan password MySQL-mu

$mysqli = new mysqli($host, $username, $password, $dbname);

return $mysqli;