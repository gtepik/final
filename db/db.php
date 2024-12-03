<?php
$host = "localhost";
$dbname = "tienda";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;tienda=$tienda", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
