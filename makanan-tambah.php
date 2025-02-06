<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_makanan = $_POST['nama_makanan'];
    $rating = $_POST['rating'];
    $harga = $_POST['harga'];
    $jenis_makanan = $_POST['jenis_makanan'];
    $bahan_baku = $_POST['bahan_baku'];
    $asal_kota = $_POST['asal_kota'];
    $tanggal_pembelian = $_POST['tanggal_pembelian'];

    $sql = "INSERT INTO makanan (nama_makanan, rating, harga, jenis_makanan, bahan_baku, asal_kota, tanggal_pembelian) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sdissss", $nama_makanan, $rating, $harga, $jenis_makanan, $bahan_baku, $asal_kota, $tanggal_pembelian);
    $stmt->execute();
    
    header("location:makanan.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Makanan</title>
</head>
<body>
    <h1>Tambah Data Makanan</h1>
    <form method="post">
        <label>Nama Makanan:</label>
        <input type="text" name="nama_makanan" required><br>

        <label>Rating:</label>
        <input type="number" step="0.1" name="rating" required><br>

        <label>Harga:</label>
        <input type="number" name="harga" required><br>

        <label>Jenis Makanan:</label>
        <input type="text" name="jenis_makanan" required><br>

        <label>Bahan Baku:</label>
        <input type="text" name="bahan_baku" required><br>

        <label>Asal Kota:</label>
        <input type="text" name="asal_kota" required><br>

        <label>Tanggal Pembelian:</label>
        <input type="date" name="tanggal_pembelian" required><br>

        <button type="submit">Tambah</button>
    </form>
</body>
</html>
