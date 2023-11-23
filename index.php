<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_perpustakaan");
$perpustakaan = mysqli_query($koneksi, "SELECT * FROM perpustakaan");

if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM perpustakaan WHERE judul LIKE '%$search%' OR jenis LIKE '$search'";
    $result = mysqli_query($koneksi, $query);

    $hasilPencarian = array();
    while ($perpus = mysqli_fetch_assoc($result)) {
        $hasilPencarian[] = $perpus;
    }
}

$dataPerHalaman = 8;

$totalData = isset($hasilPencarian) ? count($hasilPencarian) : mysqli_num_rows($perpustakaan);

$jumlahHalaman = ceil($totalData / $dataPerHalaman);

$halamanAktif = isset($_GET['halaman']) && is_numeric($_GET['halaman']) ? $_GET['halaman'] : 1;

$offset = ($halamanAktif - 1) * $dataPerHalaman;

$dataBuku = isset($hasilPencarian) ? array_slice($hasilPencarian, $offset, $dataPerHalaman) : mysqli_query($koneksi, "SELECT * FROM perpustakaan LIMIT $offset, $dataPerHalaman");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="./src/style/global.css" />
  </head>
  <body>
    <div class="index-main">
      <div class="header">
        <h1>
          <a href="index.php">PERPUSTAKAAN</a>
        </h1>
        <p>Cari buku yang kamu mau</p>
        <div class="search-bar">
          <form method="POST" action="">
            <input type="text" name="search" placeholder="Cari Buku" />
            <input type="submit" name="submit" value="Submit" />
          </form>
        </div>
        <div class="pagination">
          <?php for ($i = 1; $i <= $jumlahHalaman; $i++) { ?>
            <a class="pagination-item" href="?halaman=<?= $i ?>" class="<?= $i == $halamanAktif ? 'active' : '' ?>">
              <?= $i ?>
            </a>
          <?php } ?>
        </div>
      </div>
      <div class="book-container">
        <a href="input.php">
          <div class="book-item new-book">
            <div class="book-detail">
              <h1>+</h1>
            </div>
          </div>
        </a>
        <?php
        foreach ($dataBuku as $perpus):
        ?>
        <div class="book-item" style="background-image: url('src/assets/images/<?=$perpus['cover']?>'); background-size: cover">
          <h1><?=$perpus['judul']?></h1>
          <div class="book-detail">
            <p class="status <?= $perpus['status'] === 'ada' ? 'ada' : 'tidak' ?>">
              <?= $perpus['status'] === 'ada' ? 'Ada' : 'Tidak' ?>
            </p>
            <a class="edit" href="edit.php?id=<?=$perpus['id']?>">Edit</a>
            <a class="detail" href="detail.php?id=<?=$perpus['id']?>">Detail</a>
            <a class="delete" href="delete-function.php?id=<?=$perpus['id']?>">Delete</a>
          </div>
        </div>
        <?php endforeach;?>

        
      </div>
    </div>

    <script src="./src/js/index.js"></script>
  </body>
</html>
