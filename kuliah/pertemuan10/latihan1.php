<?php 
// Koneksi ke DB & memilih DB
$conn = mysqli_connect('localhost', 'root', 'Adinrama$345', 'pw_215150601111005');

// Query isi tabel mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// Ubah data ke dalam array
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

// Tampung ke dalam variabel mahasiswa
$mahasiswa = $rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    
    <h3>Daftar Mahasiswa</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($mahasiswa as $m): ?>
            <tr>
                <td><?= $m['id']; ?></td>
                <td><img src="img/<?= $m['gambar']; ?>" width="60"></td>
                <td><?= $m['nrp']; ?></td>
                <td><?= $m['nama']; ?></td>
                <td><?= $m['email']; ?></td>
                <td><?= $m['jurusan']; ?></td>
                <td>
                    <a href="">ubah</a> | <a href="">hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>