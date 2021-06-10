<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
?>
<?php
 
	// mengambil data barang dengan kode paling besar
	$query = mysqli_query($db, "SELECT max(id_user) as idmax FROM user");
	$data = mysqli_fetch_array($query);
	$id_user = $data['idmax'];
 
	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($id_user, 3, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
 
	// membentuk kode barang baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "U";
	$id_user = $huruf . sprintf("%03s", $urutan);
	?>
 <!doctype html> <!-- HTML 5 Tag -->
 <html lang="en"> <!-- tag pembuka HTML -->
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Aplikasi Pengelolaan Data Siswa dengan PHP 7, MySQLi,dan
        Bootstrap 4">
        <meta name="keywords" content="Aplikasi Pengelolaan Data Siswa dengan PHP 7, MySQLi, dan
        Bootstrap 4">
        <meta name="author" content="Agung Gumelar">

        <!-- favicon -->
        <link rel="shortcut icon" href="assets/img/favicon.ico">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css">
        <!-- datepicker CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/datepicker/css/datepicker.min.css">
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome-free-5.4.1-web/css/
        all.min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <!-- title -->
        <title>Data Siswa</title>
        <style>
            
            * {
                font-size: 0.9rem;
            }
            .bg-blue {
                background-color:#17a2b8 ;
                color: white;
            }

        </style>
    </head>
    <body class="">

    <!-- cek apakah sudah login -->
	
        <div class="container-fluid">
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-blue border-bottom shadow-sm">
            <h6 class="my-0 mr-lf-auto font-weight-normal">Sudah Punya User   <a href="logout.php" style="color: white;"><i class="fas fa-sign-out-alt white" ></i> Back</h6></a>
            </div>
        </div>

        <div class="container-fluid">
       
        <div class = "row">
    <div class = "col-md-12">
        <div class = "alert alert-info" role="alert">
        <i class = "fas fa-edit"></i>Input Data Siswa
    </div>
    <div class = "card" >
        <div class = "card-body">
        <!-- form tambah data siswa -->
        <form class = "needs-validation" action = "simpan_user.php" method = "post" enctype = "multipart/form-data" vovalidate>
            <div class="row">
                <div class="col">
                    <div class="form-group col-md-12">
                        <label>ID USER</label>
                        <input type="text" class="form-control" value="<?php echo $id_user ?>" name="id_user" maxlength="11" readonly>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" autocomplete="off" required>
                        <div class="invalid-feedback">Username tidak boleh kosong.</div>
                    </div>
               
                    <div class="form-group col-md-12">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" autocomplete="off" required>
                        <div class="invalid-feedback">Password tidak boleh kosong.</div>
                    </div>
                </div>

            <div class="my-md-4 pt-md-1 border-top"></div>

            <div class="form-group col-md-12 center">
                <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                <a href="index2.php" class="btn btn-secondary btn-reset"> Batal </a>
            </div>

        </form>

    </div>
</div>
</div>
</div>

        </div>

        <div class="container-fluid">
            <footer class="pt-4 my-md-4 pt-md-3 border-top">
                <div class="row">
                    <div class="col-12 col-md center">
                        &copy; 2021 - <a class="text-info" href="https://stmik-sumedang.ac.id/">❤STMIK Sumedang</a>
                    </div>
                </div>
            </footer>
        </div>

        <!-- Pemanggilan Library jQuery -->
        <!-- pertama jQuery, kemudian Bootstrap js -->
        <script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap-4.1.3/js/bootstrap.min.js"></script>
        <!-- fontawesome js -->
        <script type="text/javascript" src="assets/plugins/fontawesome-free-5.4.1-web/js/all.min.js"></script>
        <!-- datepicker js -->
        <script type="text/javascript" src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>

        <script type="text/javascript">
        // initiate plugin ============================================================================
        // --------------------------------------------------------------------------------------------
        $(document).ready(function() {
            // datepicker plugin
            $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true
            });
        } );
        // ============================================================================================

        // Validasi Form Tambah dan Form Ubah =========================================================
        // --------------------------------------------------------------------------------------------
        // Validasi form input tidak boleh kosong
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        // Validasi karakter yang boleh diinpukan pada form
        function getkey(e) {
            if (window.event)
                return window.event.keyCode;
            else if (e)
                return e.which;
            else
                return null;
        }

        function goodchars(e, goods, field) {
            var key, keychar;
            key = getkey(e);
            if (key == null) return true;

            keychar = String.fromCharCode(key);
            keychar = keychar.toLowerCase();
            goods = goods.toLowerCase();

            // check goodkeys
            if (goods.indexOf(keychar) != -1)
                return true;
            // control keys
            if ( key==null || key==0 || key==8 || key==9 || key==27 )
                return true;

            if (key == 13) {
                var i;
                for (i = 0; i < field.form.elements.length; i++)
                    if (field == field.form.elements[i])
                        break;
                        i = (i + 1) % field.form.elements.length;
                        field.form.elements[i].focus();
                    return false;
                };
            // else return false
            return false;
        }

        // validasi image dan preview image sebelum upload
        function validasiFile() {
            var fileInput = document.getElementById('foto');
            var filePath = fileInput.value;
            var fileSize = $('#foto')[0].files[0].size;
            // tentukan extension yang diperbolehkan
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            // Jika tipe file yang diupload tidak sesuai dengan allowedExtensions, tampilkan pesan :
            if (!allowedExtensions.exec(filePath)) {
                alert('Tipe file foto tidak sesuai. Harap unggah file foto yang memiliki tipe *.jpg atau *.png');
                fileInput.value = '';
                document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="foto/default.png"/>';
                return false;
            }
            // jika ukuran file yang diupload lebih dari sama dengan 1 Mb
            else if (fileSize >= 1000000) { alert('Ukuran file foto lebih dari 1 Mb. Harap unggah file foto yang memiliki ukuran maksimal 1 Mb.');
            fileInput.value = '';
            document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="foto/default.png"/>';
            return false;
            }
            // selain itu
            else {
            // Image preview
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src= "'+e.target.result+'"/>';
            };
        reader.readAsDataURL(fileInput.files[0]);
        }
    }}
// ============================================================================================
        </script>
    </body>
</html>

