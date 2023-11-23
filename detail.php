<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_perpustakaan");
$id = $_GET['id'];

$query = "SELECT * FROM perpustakaan WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);
$hasil = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail</title>
    <link rel="stylesheet" href="src/style/global.css" />
  </head>
  <body>
    <div class="detail-main">
        <div class="header">
            <h1>Judul</h1>
            <p><?= $hasil['judul'] ?></p>
        </div>
        <div class="wrapper">
        <div class="left">
          <div id="box" style="background-image: url('src/assets/images/<?=$hasil['cover']?>'); background-size: cover">
          </div>
        </div>
        <div class="right">
          <div class="right-content">
            <h1>STORYLINE</h1>
            <p><?=$hasil['story']?></p>
          </div>
          <div class="right-content">
            <h1>Penerbit</h1>
            <p><?= $hasil['penerbit'] ?></p>
          </div>
          <div class="right-content">
            <h1>Tahun</h1>
            <p><?= $hasil['tahun'] ?></p>
          </div>
          <div class="right-content">
            <h1>Jenis</h1>
            <p><?= $hasil['jenis'] ?></p>
          </div>
          <div class="right-content">
            <h1>Kondisi</h1>
            <p><?= $hasil['kondisi'] ?></p>
          </div>
          <div class="right-content">
            <h1>Status</h1>
            <p><?= $hasil['status'] ?></p>
          </div>
          <div class="right-content">
            <a href="index.php">Back</a>
          </div>
        </div>
      </div>
    </div>
    <script src="./src/js/index.js"></script>
  </body>
</html>
