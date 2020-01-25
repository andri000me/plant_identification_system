<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("location: ../../index.php");
}
include "../../static/setup/header.php";
$title = "Tanaman";
?>

<title><?= $title; ?></title>

<?php include "../../static/setup/sidebar.php"; ?>

<h1 class="h3 mb-4 text-gray-800">Menampilkan Data Tanaman</h1>
<div class="row">
    <div class="col-lg-8">

        <?php
        include "../koneksi.php";
        $query1 = "SELECT * FROM tanaman WHERE id = $_GET[id]";
        $tampil1 = mysqli_query($myKonek, $query1);
        while ($r1 = mysqli_fetch_array($tampil1)) {
        ?>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $r1['nm_tanaman']; ?>" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="khasiat" class="col-sm-2 col-form-label">Khasiat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="khasiat" name="khasiat" value="<?php echo $r1['khasiat']; ?>" disabled>
                </div>
            </div>
            <br><br>
            <a href="?pos=edit_tanaman&id=<?php echo $r1['id']; ?>" class="btn btn-primary" role="button" aria-pressed="true">Edit</a>
            <a href="?pos=delete_tanaman&id=<?php echo $r1['id']; ?>" class="btn btn-danger" role="button" aria-pressed="true">Hapus</a>

        <?php } ?>

    </div>
</div>

<?php include "../../static/setup/footer.php"; ?>


</body>

</html>
