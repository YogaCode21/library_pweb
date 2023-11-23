<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_perpustakaan");
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
    <div class="input-main">
      <form action="input-function.php" method="post" enctype="multipart/form-data">
        <h1>Judul</h1>
        <input type="text" name="judul" placeholder="judul" autocomplete="off" required/>
        <div class="wrapper">
        <div class="left">
          <div id="box" onclick="openFileChooser()">
            <span id="boxText">+</span>
          </div>
        </div>
        <div class="right">
          <div class="right-content special">
            <h1>STORYLINE</h1>
            <textarea name="story" placeholder="story" autocomplete="off" required></textarea>
          </div>
          <div class="right-content">
            <h1>Penerbit</h1>
            <input type="text" name="penerbit" placeholder="penerbit" autocomplete="off" required/>
          </div>
          <div class="right-content">
            <h1>Tahun</h1>
            <input type="text" name="tahun" placeholder="tahun" autocomplete="off" required/>
          </div>
          <div class="right-content">
            <h1>Jenis</h1>
            <input type="text" name="jenis" placeholder="jenis" autocomplete="off" required/>
          </div>
          <div class="right-content">
            <h1>Kondisi</h1>
            <select name="kondisi" required>
              <option value="" disabled selected hidden>Isi Kondisi Buku</option>
              <option value="Bagus">Bagus</option>
              <option value="Baru">Baru</option>
              <option value="Bekas">Bekas</option>
              <option value="Bersejarah">Bersejarah</option>
            </select>
          </div>
          <div class="right-content">
            <h1>Status</h1>
            <select name="status" required>
              <option value="" disabled selected hidden>Status Buku</option>
              <option value="ada">Ada</option>
              <option value="tidak">Tidak</option>
            </select>
          </div>
          <div class="right-content">
            <input type="hidden" id="imageInput" name="image" value="">
            <input type="submit" name="submit" value="Submit" />
          </div>
        </div>
      </div>
      <input type="file" id="fileChooser" style="display: none" accept="image/*" required/>
      </form>
    </div>
    <script src="./src/js/index.js"></script>
  </body>
</html>
