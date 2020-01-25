<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['admin'])) {
    header("location: ../../index.php");
}
if (!isset($_GET['id'])) {
    header("location: ../../index.php");
} else {
    include "../../config/koneksi.php";
    $id = $_GET['id'];
    $hapus_tanaman = "DELETE FROM tanaman WHERE id ='$id'";
    $hasil_tanaman = mysqli_query($myKonek, $hapus_tanaman);
    if ($hasil_tanaman) {
      echo "<script>alert('Data Telah Dihapus'); window.location.href='../../static/content/tanaman.php';</script>";
    }
}
