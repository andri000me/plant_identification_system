<?php
session_start();
include "koneksi.php";

// Ini untuk validasi field tidak boleh kosong
if ($_POST['status'] == ''|| $_POST['nomor'] == ''|| $_POST['nama'] == ''|| $_POST['username'] == ''|| $_POST['password'] == '') {
  header('location: ../index.php');
} else {
  // Jika status adalah dosen maka akan menjalankan code ini
  if ($_POST['status'] == "2") {

      $query_dosen = "INSERT INTO
          dosen (NIP, nm_dosen, jurusan, mata_kuliah, username, password)
          VALUES ('$_POST[nomor]', '$_POST[nama]', 'Teknik Informatika', 'Web Programming', '$_POST[username]', '$_POST[password]')";

          // untuk menyambukan ke database
      if ($myKonek->query($query_dosen) === TRUE) {

          $query1 = "SELECT * FROM dosen";
          $hasil1 = mysqli_query($myKonek, $query1);
          $jumlahData = mysqli_num_rows($hasil1);

          $i = 1;

          $query2 = "SELECT id_dosen FROM dosen";
          $hasil2 = mysqli_query($myKonek, $query2);

          // Untuk mengisi id dosen secara otomatis
          while ($idData = mysqli_fetch_array($hasil2)) {
              if ($i == $jumlahData) {
                  $id_dos = $idData['id_dosen'];
              }
              $i++;
          }

          // Menambah data ke dalam database user
          $query_users = "INSERT INTO
              users (username, password, level, nm_level, id_level)
              VALUES ('$_POST[username]', '$_POST[password]', '$_POST[status]', 'Dosen', '$id_dos')";

              // Menampilkan pesan berhasil
          if ($myKonek->query($query_users) === TRUE) {
              $_SESSION['dosen'] = "dosen";
              echo "<script>alert('Selamat Anda Telah Terdaftar'); window.location.href='../index.php';</script>";
          } else {
              echo "Error ! : " . $query_users . "<br>" . $myKonek->error;
          }
      } else {
          echo "Error ! : " . $query_dosen . "<br>" . $myKonek->error;
      }
  } else {
    // Jika status adalah mahasiswa
      $query_mahasiswa = "INSERT INTO
          mahasiswa (NIM, nm_mahasiswa, semester, dosen_id, jurusan, kelas, username, password, data_submit)
          VALUES ('$_POST[nomor]', '$_POST[nama]', '3', 1, 'Teknik Informatika', 'A', '$_POST[username]', '$_POST[password]', 0)";

          // Menyambungkan ke database
      if ($myKonek->query($query_mahasiswa) === TRUE) {

          $query1 = "SELECT * FROM mahasiswa";
          $hasil1 = mysqli_query($myKonek, $query1);
          $jumlahData = mysqli_num_rows($hasil1);

          $i = 1;

          $query2 = "SELECT id_mahasiswa FROM mahasiswa";
          $hasil2 = mysqli_query($myKonek, $query2);

          // Memasukkan id mahasiswa ke database
          while ($idData = mysqli_fetch_array($hasil2)) {
              if ($i == $jumlahData) {
                  $id_dos = $idData['id_mahasiswa'];
              }
              $i++;
          }

          // Memasukkan data ke dalam user
          $query_users = "INSERT INTO
              users (username, password, level, nm_level, id_level)
              VALUES ('$_POST[username]', '$_POST[password]', 3, 'Mahasiswa', '$id_dos')";

              //Menampilkan pesan berhasil
          if ($myKonek->query($query_users) === TRUE) {
              echo "<script>alert('Selamat Anda Telah Terdaftar'); window.location.href='../index.php';</script>";
          } else {
              echo "Error ! : " . $query_users . "<br>" . $myKonek->error;
          }
      } else {
          echo "Error ! : " . $query_mahasiswa . "<br>" . $myKonek->error;
      }
  }
}
