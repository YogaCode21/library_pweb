<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_perpustakaan");

$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$image = $_POST['image'];
$jenis = $_POST['jenis'];
$kondisi = $_POST['kondisi'];
$status = $_POST['status'];
$story = $_POST['story'];

$insert = mysqli_query($koneksi, "insert into perpustakaan set judul='$judul',penerbit='$penerbit',tahun='$tahun',cover='$image',jenis='$jenis',kondisi='$kondisi',status='$status',story='$story'");
header("Location: index.php");
