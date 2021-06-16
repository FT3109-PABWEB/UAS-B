<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol hapus diklik
if (isset($_GET['id_buku'])) {
// ambil data get dari form
$id_buku = $_GET['id_buku'];
// perintah query untuk menampilkan data foto siswa berdasarkan nis
$query = mysqli_query($db, "SELECT foto FROM buku WHERE id_buku='$id_buku'")
or die('Ada kesalahan pada query tampil data foto :'.mysqli_error($db));
$data = mysqli_fetch_assoc($query);
$foto = $data['foto'];
$hapus_file = unlink("foto/$foto");
// cek hapus file
if ($hapus_file) {
// jika file berhasil dihapus jalankan perintah query untuk menghapus data pada tabel siswa
$delete = mysqli_query($db, "DELETE FROM buku WHERE id_buku='$id_buku'")
or die('Ada kesalahan pada query delete :'.mysqli_error($db));
// cek hasil query
if ($delete) {
// jika berhasil tampilkan pesan berhasil delete data
header("location: index.php?alert=3");
}
}
}
mysqli_close($db);
?>