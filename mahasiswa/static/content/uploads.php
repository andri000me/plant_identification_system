<?php
session_start();
if (isset($_POST['submit_identifikasi'])) {
    $url = 'https://us-central1-api-automl.cloudfunctions.net/apiweb3c';

    $post_data = [
        'gambar_tanaman' => base64_encode(file_get_contents($_FILES['gambar_tanaman']['tmp_name']))
    ];

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL => $url,
        CURLOPT_CONNECTTIMEOUT => 60,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $post_data,
    ));

    $response = curl_exec($curl); // Response dari API
    curl_close($curl);

    $result = json_decode($response); // Decode response
}

?>

<!-- Akses Object -->
<?php if (isset($result)) : ?>
    <h1> <?php print_r($result->object) ?></h1>
<?php endif ?>

<!DOCTYPE html>
<html>

<head>
    <title>Web ini</title>
</head>

<body>

    <?php
    $my = mysqli_connect("localhost", "root", "", "db_sistem_pakar");
    $query = "SELECT * FROM tanaman ";
    $jika = mysqli_query($my, $query);
    while ($b = mysqli_fetch_array($jika)) {
        // if ($b['nm_tanaman'] == "rose") {
            if ($b['nm_tanaman'] ==  $result->object) {
            $_SESSION['nama_tanaman'] = $b['nm_tanaman'];
            $_SESSION['deskripsi'] = $b['khasiat'];
            header("location: data.php");
        }
    }
    ?>

</body>

</html>