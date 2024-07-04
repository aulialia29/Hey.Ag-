<?php 

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "db_tokoagni"; 

$cn = new mysqli($servername, $username, $password, $dbname); 

if ($cn->connect_error) { 
    die("Koneksi gagal: " . $cn->connect_error); 
} 
?>
