<?php

function koneksi()
{
  return mysqli_connect("localhost", "root", "", "phpdasar");
}

function query($query)
{
  $db = koneksi();
  $result = mysqli_query($db, $query);
  $rows = [];

  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $db = koneksi();
  $nama = htmlspecialchars($data['nama']);
  $npm = htmlspecialchars($data['npm']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$npm', '$email', '$jurusan', '$gambar')";
  mysqli_query($db, $query);
  echo mysqli_error($db);
  return mysqli_affected_rows($db);
}
