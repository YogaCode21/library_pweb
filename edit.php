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
    <title>Background Image Box</title>
    <link rel="stylesheet" href="src/style/global.css" />
  </head>
  <body>
    <div class="edit-main">
      <form action="update-function.php?id=<?= $hasil['id']?>" method="post" enctype="multipart/form-data">
        <h1>Judul</h1>
        <input type="text" name="judul" placeholder="judul" value="<?= $hasil['judul'] ?>" autocomplete="off" required/>
        <div class="wrapper">
        <div class="left">
          <div id="box" onclick="openFileChooser()" style="background-image: url('src/assets/images/<?=$hasil['cover']?>'); background-size: cover">
          </div>
          
        </div>
        <div class="right">
          <div class="right-content special">
            <h1>STORYLINE</h1>
            <textarea name="story" placeholder="story" autocomplete="off" required><?= $hasil['story'] ?></textarea>
          </div>
          <div class="right-content">
            <h1>Penerbit</h1>
            <input type="text" name="penerbit" placeholder="penerbit" autocomplete="off" value="<?= $hasil['penerbit'] ?>" required/>
          </div>
          <div class="right-content">
            <h1>Tahun</h1>
            <input type="text" name="tahun" placeholder="tahun" autocomplete="off" value="<?= $hasil['tahun'] ?>" required/>
          </div>
          <div class="right-content">
            <h1>Jenis</h1>
            <input type="text" name="jenis" placeholder="jenis" autocomplete="off" value="<?= $hasil['jenis'] ?>" required/>
          </div>
          <div class="right-content">
            <h1>Kondisi</h1>
            <select name="kondisi" required>
              <option value="" disabled selected hidden>Isi Kondisi Buku</option>
              <option value="Bagus" <?php if ($hasil['kondisi'] == 'Bagus') echo 'selected'; ?>>Bagus</option>
              <option value="Baru" <?php if ($hasil['kondisi'] == 'Baru') echo 'selected'; ?>>Baru</option>
              <option value="Bekas" <?php if ($hasil['kondisi'] == 'Bekas') echo 'selected'; ?>>Bekas</option>
              <option value="Bersejarah" <?php if ($hasil['kondisi'] == 'Bersejarah') echo 'selected'; ?>>Bersejarah</option>
            </select>
          </div>
          <div class="right-content">
            <h1>Status</h1>
            <select name="status" required>
              <option value="ada" <?php if ($hasil['status'] == 'ada') echo 'selected'; ?>>Ada</option>
              <option value="tidak" <?php if ($hasil['status'] == 'tidak') echo 'selected'; ?>>Tidak</option>
            </select>
          </div>
          <div class="right-content">
            <input type="text" style="display: none;" id="imageInput" name="image" value="<?php echo @$hasil['cover']?>">
            <input type="submit" name="submit" value="Submit" />
          </div>
        </div>
      </div>
      <input type="file" id="fileChooser" style="display: none" accept="image/*" />
      
      </form>
    </div>
    <script src="./src/js/index.js"></script>
  </body>
</html>
