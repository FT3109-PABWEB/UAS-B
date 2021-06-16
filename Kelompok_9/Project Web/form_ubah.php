<?php
// jika tombol ubah diklik
if (isset($_GET['id_buku'])) {
// ambil data get dari form
$id_buku = $_GET['id_buku'];
// perintah query untuk menampilkan data dari tabel siswa berdasarkan nis
$query = mysqli_query($db, "SELECT * FROM buku WHERE id_buku='$id_buku'")
or die('Query Error : '.mysqli_error($db));
$data = mysqli_fetch_assoc($query);
// buat variabel untuk menampung data
$id_buku = $data['id_buku'];
$nama_buku = $data['nama_buku'];
$Kategori = $data['Kategori'];
$Penulis = $data['Penulis'];
$Penerbit = $data['Penerbit'];
$Tahun_Terbit = $data['Tahun_Terbit'];
$foto = $data['foto'];
}
// tutup koneksi
mysqli_close($db);
?>

<div class="row">
<div class="col-md-12">
<div class="alert alert-info" role="alert">
<i class="fas fa-edit"></i> Ubah Data Buku
</div>

<div class="card">
<div class="card-body">
<!-- form ubah data siswa -->
<form class="needs-validation" action="proses_ubah.php" method="post"
enctype="multipart/form-data" novalidate>
<div class="row">
<div class="col">
<div class="form-group col-md-12">
<label>ID Buku</label>
<input type="text" class="form-control" name="id_buku" maxlength="10"
onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off"
value="<?php echo $id_buku; ?>" readonly required>
<div class="invalid-feedback">ID Buku tidak boleh kosong.</div>
</div>

<div class="form-group col-md-12">
<label>Nama Buku</label>
<input type="text" class="form-control" name="nama_buku" autocomplete="off"
value="<?php echo $nama_buku; ?>" required>
<div class="invalid-feedback">Nama buku tidak boleh kosong.</div>
</div>


<div class="form-group col-md-12">
<label>Kategori</label>
<select class="form-control" name="Kategori" autocomplete="off" required>
<option value="<?php echo $Kategori; ?>"><?php echo $Kategori; ?></option>
<option value="Karya Ilmiah">Karya Ilmiah</option>
<option value="Biografi">Biografi</option>
<option value="Novel">Novel</option>
<option value="Komik">Komik</option>
<option value="Ensiklopedia">Ensiklopedia</option>
</select>
<div class="invalid-feedback">Kategori buku tidak boleh kosong.</div>
</div>
</div>

<div class="col">
<div class="form-group col-md-12">
<label>Penulis</label>
<input type="text" class="form-control" name="Penulis" autocomplete="off"
value="<?php echo $Penulis; ?>" required>
<div class="invalid-feedback">Nama Penulis tidak boleh kosong.</div>
</div>


<div class="form-group col-md-12">
<label>Penerbit</label>
<textarea class="form-control" rows="2" name="Penerbit" autocomplete="off" required>
<?php echo $Penerbit; ?></textarea>
<div class="invalid-feedback">Penerbit tidak boleh kosong.</div>
</div>

<div class="form-group col-md-12">
<label>Tahun Terbit</label>
<textarea class="form-control" rows="2" name="Tahun_Terbit" autocomplete="off" required>
<?php echo $Tahun_Terbit; ?></textarea>
<div class="invalid-feedback">Tahun Terbit tidak boleh kosong.</div>
</div>



<div class="col">
<div class="form-group col-md-12">
<label>Foto siswa</label>
<input type="file" class="form-control-file mb-3" id="foto" name="foto"
onchange="return validasiFile()" autocomplete="off" value="<?php echo $foto; ?>">
<div id="imagePreview"><img class="foto-preview" src="foto/<?php echo $foto; ?>"/></div>
</div>
</div>
</div>

<div class="my-md-4 pt-md-1 border-top"> </div>

<div class="form-group col-md-12 right">
<input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
<a href="index.php" class="btn btn-secondary btn-reset"> Batal </a>
</div>
</form>
</div>
</div>
</div>
</div>