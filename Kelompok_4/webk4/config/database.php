<?php 
// mengatur zona waktu default
date_default_timezone_set("ASIA/JAKARTA");

// deklarasi parameter koneksi database
$server     =   "localhost";    // server default "localhost" atau "127.0.0.1"
$username   =   "root";         // username database default "root"
$password   =   "";             // password daabase default , kosong
$database   =   "db_sekolah";   // nama database yang digunakan

// koneksi database
$db = mysqli_connect($server, $username, $password, $database);

// cek koneksi
if (!$db) {
    //koneksi gagal, tampilkan pesan gagal
    die('Koneksi ke database gagal : '.mysqli_connect_error());

}
?> 
