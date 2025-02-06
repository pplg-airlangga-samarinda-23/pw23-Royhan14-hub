<?php
require 'koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM makanan WHERE id=?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("location:makanan.php");
exit();
?>
