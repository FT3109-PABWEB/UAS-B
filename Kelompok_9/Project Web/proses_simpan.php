<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    $id_buku    = mysqli_real_escape_string($db, trim($_POST['id_buku']));
    $nama_buku   = mysqli_real_escape_string($db, trim($_POST['nama_buku']));
    $Kategori = mysqli_real_escape_string($db, trim($_POST['Kategori']));
    $Penulis = mysqli_real_escape_string($db, trim($_POST['Penulis']));
    $Penerbit = mysqli_real_escape_string($db, trim($_POST['Penerbit']));
    $Tahun_Terbit = mysqli_real_escape_string($db, trim($_POST['Tahun_Terbit']));
    $nama_file = $_FILES['foto']['name'];
    $tmp_file = $_FILES['foto']['tmp_name'];
    // Set path folder tempat menyimpan filenya
    $path = "./foto/".$nama_file;

    // perintah query untuk menampilkan nis dari tabel siswa berdasarkan nis dari hasil submit form
    $query = mysqli_query($db, "SELECT id_buku FROM buku WHERE id_buku=$id_buku")
    or die('Ada kesalahan pada query tampil data id_buku: '.mysqli_error($db));
    $rows = mysqli_num_rows($query);
    // jika nis sudah ada
    if ($rows > 0) {
    // tampilkan pesan gagal simpan data
    header("location: index.php?alert=4&nis=$id_buku");
    }
    // jika nis belum ada
    else {
        // upload file
        $upload = move_uploaded_file($tmp_file, $path);
        //print_r($upload);
        if($upload) {
            // Jika file berhasil diupload, Lakukan :
            // perintah query untuk menyimpan data ke tabel siswa
            $insert = mysqli_query($db, "INSERT INTO buku(id_buku,nama_buku,Kategori,Penulis,Penerbit,Tahun_Terbit,foto)
            VALUES('$id_buku','$nama_buku','$Kategori','$Penulis',
            '$Penerbit','$Tahun_Terbit','$nama_file')")
            or die('Ada kesalahan pada query insert : '.mysqli_error($db));
            // cek query
            if ($insert) {
                // jika berhasil tampilkan pesan berhasil simpan data
                exit(header("location: index.php?alert=1",true , 301));
            }
        }
        echo "gagal upload";
    }
} else {
    echo"gagal";
}
// tutup koneksi
mysqli_close($db);
?>