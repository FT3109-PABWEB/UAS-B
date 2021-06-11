<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
// ambil data hasil submit dari form
$id_user		= mysqli_real_escape_string($db, trim($_POST['id_user']));
$username		= mysqli_real_escape_string($db, trim($_POST['username']));
$password		= mysqli_real_escape_string($db, trim($_POST['password']));

// perintah query untuk menampilkan nis dari tabel siswa berdasarkan nis dari hasil submit form
$query = mysqli_query($db, "SELECT id_user FROM user WHERE id_user='id_user'")
or die('Ada kesalahan pada query tampil data nis: '.mysqli_error($db));
$rows = mysqli_num_rows($query);
// jika nis sudah ada
if ($rows > 0) {
	// tampilkan pesan gagal simpan data
	header("location: daftar_user.php?alert=4&id_user=$id_user");
}
// jika nis belum ada
else {
	
		// perintah query untuk menyimpan data ke tabel siswa
		$insert = mysqli_query($db, "INSERT INTO user (id_user,username,password)
			VALUES('$id_user','$username','$password')")
			or die('Ada kesalahan pada query insert : '.mysqli_error($db));
			// cek query
			if ($insert) {
			// jika berhasil tampilkan pesan berhasil simpan data
			header("location: index.php?alert=Berhasil membuat user");
			}
		}
}

// tutup koneksi
mysqli_close($db);
?>