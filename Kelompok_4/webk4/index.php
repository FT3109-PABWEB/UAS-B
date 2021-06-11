<!DOCTYPE html>
<html>
<head>
	<title>Login Ke Data Siswa</title>
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
        <link rel="stylesheet" type="text/css" href="assets/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

        <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
   
</head>
<body class="text-center" >

   
	<br/>
	<br/>
    
	<form class="form-signin" method="post" action="cek_login.php">
        <img class="mb-4" src="assets/img/logo.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <input type="text"  class="form-control" name="username" placeholder="Username">
		<input type="password" class="form-control" name="password" placeholder="Password">
		<input class="btn btn-lg btn-primary btn-block" type="submit" value="LOGIN">
        <br/>
        <a href="daftar_user.php">Sign Up</a>
						
	</form>
    </div>
</body>
</html>