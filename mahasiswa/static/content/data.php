<?php
session_start();
if (!isset($_SESSION['mahasiswa'])) {
    header("location: ../../../index.php");
}
include "../setup/header.php";
$title = "Mahasiswa";
?>

<title><?= $title; ?></title>

<style>
    .isi {
        width: 1000px;
        height: 800px;
        background-color: lightgrey;
        margin: 50px auto;
        border: 1px dashed;
        border-radius: 12px;
    }

    .headerDiv {
        width: 1000px;
        height: 180px;
        background-color: grey;
        text-align: center;
        vertical-align: center;
        color: white;
        border-radius: 12px;
    }

    .h1Header {
        font-size: 850%;
    }

    .descr p {
        text-align: center;
        color: black;
        font-size: 150%;
        padding : 10px;
    }
</style>

<?php include "../setup/sidebar.php"; ?>

<div class="isi">
    <a href="mahasiswa.php" class="btn btn-primary" role="button" aria-pressed="true" style="width: 1000px;">Kembali</a>
    <div class="headerDiv">
        <h1 class="h1Header"><?= $_SESSION['nama_tanaman']; ?></h1>
    </div>
    <div class="descr">
        <p><?= $_SESSION['deskripsi']; ?></p>
    </div>
</div>

<?php include "../setup/footer.php"; ?>
<div class="text-center">

</div>



</body>

</html>
