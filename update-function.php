<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_perpustakaan");

$id = $_GET['id'];

$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$image = $_POST['image'];
$jenis = $_POST['jenis'];
$kondisi = $_POST['kondisi'];
$status = $_POST['status'];
$story = $_POST['story'];

if(!$image){
    $image = $_POST['image'];
}
$insert = mysqli_query($koneksi, "UPDATE perpustakaan SET judul='$judul',penerbit='$penerbit',tahun='$tahun',cover='$image',jenis='$jenis',kondisi='$kondisi',status='$status',story='$story' WHERE id='$id'");
header("Location: index.php");
