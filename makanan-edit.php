<?php
require 'koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM makanan WHERE id=?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_makanan = $_POST['nama_makanan'];
    $rating = $_POST['rating'];
    $harga = $_POST['harga'];
    $jenis_makanan = $_POST['jenis_makanan'];
    $bahan_baku = $_POST['bahan_baku'];
    $asal_kota = $_POST['asal_kota'];
    $tanggal_pembelian = $_POST['tanggal_pembelian'];

    $sql = "UPDATE makanan SET nama_makanan=?, rating=?, harga=?, jenis_makanan=?, bahan_baku=?, asal_kota=?, tanggal_pembelian=? WHERE id=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sdissssi", $nama_makanan, $rating, $harga, $jenis_makanan, $bahan_baku, $asal_kota, $tanggal_pembelian, $id);
    $stmt->execute();
    
    header("location:makanan.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Makanan</title>
</head>
<body>
    <h1>Edit Data Makanan</h1>
    <form method="post">
        <label>Nama Makanan:</label>
        <input type="text" name="nama_makanan" value="<?= $row['nama_makanan'] ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
