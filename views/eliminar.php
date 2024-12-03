<?php
$conn = new mysqli("localhost", "root", "", "tienda");
$id = $_GET['id'];
$sql = "DELETE FROM productos WHERE id = $id";
$conn->query($sql);
header("Location: index.php");
?>
