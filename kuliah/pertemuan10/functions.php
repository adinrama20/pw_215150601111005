<?php 

function koneksi()
{
  return mysqli_connect('localhost', 'root', 'Adinrama$345', 'pw_215150601111005');
}

function query($query)
{
  $result = mysqli_query(koneksi(), $query);

  // Jika datanya hanya 1
  if (mysqli_num_rows($result) == 1)
  {
    return mysqli_fetch_assoc($result);
  }

  // Jika datanya ada banyak
  $rows = [];
  while ($row = mysqli_fetch_assoc($result))
  {
      $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO
              mahasiswa
            VALUES
              (null, '$nama', '$nrp', '$email', '$jurusan', '$gambar');
            ";

  mysqli_query(koneksi(), $query);
  echo mysqli_error(koneksi());

  return mysqli_affected_rows(koneksi());
}

?>