<?php
$host = "localhost"; // Sesuaikan dengan konfigurasi server MySQL-mu
$dbname = "pelatihan";
$username = "root"; // Sesuaikan dengan username MySQL-mu
$password = "tegar"; // Sesuaikan dengan password MySQL-mu

$db = new mysqli($host, $username, $password, $dbname);

return $db;