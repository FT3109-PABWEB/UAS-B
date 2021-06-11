<?php
//Koneksi Database
$server = "localhost";
$user = "root";
$pass = "";
$database = "uas";

$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

//jika tombol simpan diklik
if (isset($_POST['bsimpan'])) {
	//Pengujian Apakah data akan diedit atau disimpan baru
	if ($_GET['hal'] == "edit") {
		//Data akan di edit
		$edit = mysqli_query($koneksi, "UPDATE tmhs set
											 	nim = '$_POST[tnim]',
											 	nama = '$_POST[tnama]',
												alamat = '$_POST[talamat]',
											 	prodi = '$_POST[tprodi]'
											 WHERE id_mhs = '$_GET[id]'
										   ");
		if ($edit) //jika edit sukses
		{
			echo "<script>
						alert('Edit data suksess!');
						document.location='index.php';
				     </script>";
		} else {
			echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index.php';
				     </script>";
		}
	} else {
		//Data akan disimpan Baru
		$simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, alamat, prodi)
										  VALUES ('$_POST[tnim]', 
										  		 '$_POST[tnama]', 
										  		 '$_POST[talamat]', 
										  		 '$_POST[tprodi]')
										 ");
		if ($simpan) //jika simpan sukses
		{
			echo "<script>
						alert('Simpan data suksess!');
						document.location='index.php';
				     </script>";
		} else {
			echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='index.php';
				     </script>";
		}
	}
}


//Pengujian jika tombol Edit / Hapus di klik
if (isset($_GET['hal'])) {
	//Pengujian jika edit Data
	if ($_GET['hal'] == "edit") {
		//Tampilkan Data yang akan diedit
		$tampil = mysqli_query($koneksi, "SELECT * FROM tmhs WHERE id_mhs = '$_GET[id]' ");
		$data = mysqli_fetch_array($tampil);
		if ($data) {
			//Jika data ditemukan, maka data ditampung ke dalam variabel
			$vnim = $data['nim'];
			$vnama = $data['nama'];
			$valamat = $data['alamat'];
			$vprodi = $data['prodi'];
		}
	} else if ($_GET['hal'] == "hapus") {
		//Persiapan hapus data
		$hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_GET[id]' ");
		if ($hapus) {
			echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='index.php';
				     </script>";
		}
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Kelompok5</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>


<body>
	<div class="container">

		<h1 class="text-center" style="color: red;">Data Mahasiswa</h1>
		<h2 class="text-center" style="color: green;">Kelompok 5</h2>

		<!-- Awal Card Form -->
		<div class="card mt-3">
			<div class="card-header bg-primary text-white">
				Form Input Data Mahasiswa
			</div>
			<div class="card-body">
				<form method="post" action="">
					<div class="form-group">
						<label>Nim</label>
						<input type="text" name="tnim" value="<?= @$vnim ?>" class="form-control" placeholder="Input Nim anda disini!" required>
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="tnama" value="<?= @$vnama ?>" class="form-control" placeholder="Input Nama anda disini!" required>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="talamat" placeholder="Input Alamat anda disini!"><?= @$valamat ?></textarea>
					</div>
					<div class="form-group">
						<label>Program Studi</label>
						<select class="form-control" name="tprodi">
							<option value="<?= @$vprodi ?>"><?= @$vprodi ?></option>
							<option value="D3-MI">D3-MI</option>
							<option value="S1-SI">S1-SI</option>
							<option value="S1-TI">S1-TI</option>
						</select>
					</div>

					<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
					<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

				</form>
			</div>
		</div>
		<!-- Akhir Card Form -->

		<!-- Awal Card Tabel -->
		<div class="card mt-3">
			<div class="card-header bg-success text-white">
				Daftar Mahasiswa
			</div>
			<div class="card-body">

				<table class="table table-bordered table-striped">
					<tr>
						<th>No.</th>
						<th>Nim</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Program Studi</th>
						<th>Aksi</th>
					</tr>
					<?php
					$no = 1;
					$tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id_mhs desc");
					while ($data = mysqli_fetch_array($tampil)) :

					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $data['nim'] ?></td>
							<td><?= $data['nama'] ?></td>
							<td><?= $data['alamat'] ?></td>
							<td><?= $data['prodi'] ?></td>
							<td>
								<a href="index.php?hal=edit&id=<?= $data['id_mhs'] ?>" class="btn btn-warning"> Edit </a>
								<a href="index.php?hal=hapus&id=<?= $data['id_mhs'] ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
							</td>
						</tr>
					<?php endwhile; //penutup perulangan while 
					?>
				</table>

			</div>
		</div>
		<!-- Akhir Card Tabel -->

	</div>

	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>