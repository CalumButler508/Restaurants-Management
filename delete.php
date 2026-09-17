<?php 
include 'db.php'; include 'auth.php';
$id = $_GET['id'];
$conn->query("DELETE FROM menu WHERE id=$id");
header("Location: menu.php");
?>
