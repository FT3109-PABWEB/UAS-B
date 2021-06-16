<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
if (isset($_POST['id_buku'])) {
// ambil data hasil submit dari form
$id_buku = mysqli_real_escape_string($db, trim($_POST['id_buku']));
$nama_buku = mysqli_real_escape_string($db, trim($_POST['nama_buku']));
$Kategori = mysqli_real_escape_string($db, trim($_POST['Kategori']));
$Penulis = mysqli_real_escape_string($db, trim($_POST['Penulis']));
$Penerbit = mysqli_real_escape_string($db, trim($_POST['Penerbit']));
$Tahun_Terbit = mysqli_real_escape_string($db, trim($_POST['Tahun_Terbit']));
$nama_file = $_FILES['foto']['name'];
$tmp_file = $_FILES['foto']['tmp_name'];
 // Set path folder tempat menyimpan filenya
$path = "foto/".$nama_file;

// jika foto tidak diubah
if (empty($nama_file)) {
// perintah query untuk mengubah data pada tabel siswa
$update = mysqli_query($db, "UPDATE buku SET nama = '$nama_buku',
nama_buku = '$nama_buku',
Kategori = '$Kategori',
Penulis = '$Penulis',
Penerbit = '$Penerbit',
Tahun_Terbit = '$Tahun_Terbit',
WHERE id_buku = '$id_buku'")
or die('Ada kesalahan pada query update : '.mysqli_error($db));
// cek query
if ($update) {
// jika berhasil tampilkan pesan berhasil ubah data
header("location: index.php?alert=2");
}
}
// jika foto diubah
else {
// upload file
if(move_uploaded_file($tmp_file, $path)) {
// Jika file berhasil diupload, Lakukan :
// perintah query untuk mengubah data pada tabel siswa
$update = mysqli_query($db, "UPDATE buku SET nama_buku = '$nama_buku',
Kategori = '$Kategori',
Penulis = '$Penulis',
Penerbit = '$Penerbit',
Tahun_Terbit = '$Tahun_Terbit',
foto = '$nama_file'
WHERE id_buku = '$id_buku'")
 or die('Ada kesalahan pada query update : '.mysqli_error($db));
// cek query
if ($update) {
// jika berhasil tampilkan pesan berhasil ubah data
header("location: index.php?alert=2");
}
}
}
}
}
mysqli_close($db);
?>