<?php
require 'koneksi.php';

$sql = "SELECT * FROM makanan";
$result = $koneksi->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Makanan</title>
</head>
<body>
    <h1>Data Makanan</h1>
    <a href="makanan-tambah.php">Tambah Data</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Makanan</th>
                <th>Rating</th>
                <th>Harga</th>
                <th>Jenis Makanan</th>
                <th>Bahan Baku</th>
                <th>Asal Kota</th>
                <th>Tanggal Pembelian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['nama_makanan']) ?></td>
                    <td><?= htmlspecialchars($row['rating']) ?></td>
                    <td><?= htmlspecialchars($row['harga']) ?></td>
                    <td><?= htmlspecialchars($row['jenis_makanan']) ?></td>
                    <td><?= htmlspecialchars($row['bahan_baku']) ?></td>
                    <td><?= htmlspecialchars($row['asal_kota']) ?></td>
                    <td><?= htmlspecialchars($row['tanggal_pembelian']) ?></td>
                    <td>
                        <a href="makanan-edit.php?id=<?= $row['id'] ?>">Edit</a> |
                        <a href="makanan-hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
