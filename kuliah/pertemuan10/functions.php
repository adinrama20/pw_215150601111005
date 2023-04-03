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

?>