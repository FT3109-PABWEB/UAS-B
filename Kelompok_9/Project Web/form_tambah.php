<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info" role="alert">
            <i class="fas fa-edit"></i> Input Data Buku
        </div>
        <div class="card">
            <div class="card-body">
                <!-- form tambah data siswa -->
                <form class="needs-validation" action="proses_simpan.php" method="post" enctype="multipart/form-data"
                    novalidate>
                    <div class="row">
                        <div class="col">
                            <div class="form-group col-md-12">
                                <label>ID Buku</label>
                                <input type="text" class="form-control" name="id_buku" maxlength="10"
                                    onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
                                <div class="invalid-feedback">ID Buku tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Nama Buku</label>
                                <input type="text" class="form-control" name="nama_buku" autocomplete="off" required>
                                <div class="invalid-feedback">Nama buku tidak boleh kosong.</div>
                            </div>

                            

                            

                        <div class="col">
                            <div class="form-group col-md-12">
                            <label>Kategori</label>
                                <select class="form-control" name="Kategori" autocomplete="off" required>
                                
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
                                <input type="text" class="form-control" name="Penulis" autocomplete="off" required>
                                <div class="invalid-feedback">Nama penulis tidak boleh kosong.</div>
                            </div>

                            <div class="col">
                            <div class="form-group col-md-12">
                                <label>Penerbit</label>
                                <input type="text" class="form-control" name="Penerbit" autocomplete="off" required>
                                <div class="invalid-feedback">Nama penerbit tidak boleh kosong.</div>
                            </div>

                            <div class="col">
                            <div class="form-group col-md-12">
                                <label>Tahun Terbit</label>
                                <input type="text" class="form-control" name="Tahun_Terbit" autocomplete="off" required>
                                <div class="invalid-feedback">Tahun terbit tidak boleh kosong.</div>
                            </div>

                            

                        <div class="col">
                            <div class="form-group col-md-12">
                                <label>Foto Buku</label>
                                <input type="file" class="form-control-file mb-3" id="foto" name="foto"
                                    onchange="return validasiFile()" autocomplete="off" required>
                                <div id="imagePreview"><img class="foto-preview" src="/buku/foto/Book.png"
                                        style="max-width:192px;max-height:108px" /></div>
                                <div class="invalid-feedback">Foto buku tidak boleh kosong.</div>
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