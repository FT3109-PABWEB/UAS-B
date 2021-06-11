<?php 
$nama = $_POST['nama'];
 
if($nama == ""){
	header("location:index.php?nama=kosong");
}else{
	echo "Nama anda adalah". $nama;
}
?>