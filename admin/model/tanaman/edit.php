<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['admin'])) {
    header("location: ../../index.php");
}

if (!isset($_POST['id'])) {
    header("location: ../../static/content/dashboard.php");
} else {
    include "../../config/koneksi.php";

    $query = "UPDATE tanaman
    SET nm_tanaman = '$_POST[nama]', khasiat = '$_POST[khasiat]'
    WHERE id = '$_POST[id]'";

    if ($myKonek->query($query) === TRUE) {
        echo "<script>alert('Selamat Data Telah Diubah'); window.location.href='../../static/content/index.php';</script>";
    } else {
        echo "Error ! : " . $query . "<br>" . $conn->error;
    }
}
