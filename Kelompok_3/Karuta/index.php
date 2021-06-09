<?php

require 'functions.php';
require 'desain.php';

// sorting old
// $worker = query("SELECT * FROM worker ORDER BY effort_card DESC");

// pagination


// // ori
$jumlahDataPerPage = 5;
$jumlahData = count(query("SELECT * FROM worker"));
$jumlahPage = ceil($jumlahData / $jumlahDataPerPage);

// permanen
$pageAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$dataAwal = ($jumlahDataPerPage * $pageAktif) - $jumlahDataPerPage;


$worker = query("SELECT * FROM worker LIMIT $dataAwal,$jumlahDataPerPage");

// jika tombol search di tekan
if (isset($_POST["search"])) {
	$worker = search($_POST["keyword"]);
}

// modif
// $jumlahDataPerPage = 5;
// if (isset($_GET['search'])) {
// 	$jumlahData = count(search($_GET['keyword']));
// } else {
// 	$jumlahData = count(query("SELECT * FROM worker"));
// }

// $jumlahPage = ceil($jumlahData / $jumlahDataPerPage);

// // permanen
// $pageAktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
// $dataAwal = ($jumlahDataPerPage * $pageAktif) - $jumlahDataPerPage;

// // jika tombol search di tekan
// if (isset($_GET['search'])) {
// 	$keyword = $_GET['keyword'];
// 	$worker = search2($keyword,$dataAwal,$jumlahDataPerPage);
// } else {
// 	$worker = query("SELECT * FROM worker LIMIT $dataAwal,$jumlahDataPerPage");
// }



?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Worker Data</title>
</head>

<body>

	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<!-- worker -->
			<a class="navbar-brand" href="index.php"><img src="img/karuta.png" width="30" height="30" class="d-inline-block align-top" alt="" style="border-radius: 50%;"> Home</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="container">
				<!-- items -->
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">

						<!-- add data worker -->
						<li class="nav-item active">
							<a class="nav-link" href="add.php">Add Data Worker<span class="sr-only">(current)</span></a>
						</li>

						<!-- Feature -->
						<li class="nav-item">
							<a class="nav-link" href="https://karuta.xyz/" target="_blank">CREDIT TO KARUTA</a>
						</li>
					</ul>

				</div>
			</div>
		</div>
	</nav>

	<!-- judul -->
	<div class="container">
		<h2><br>List Worker<br></h2>
	</div>

	<!-- search -->
	<div class="container">

		<!-- form -->
		<form action="" method="post">
			<div class="form-row align-items-center">
				<form action="" method="post">
					<div class="form-group mx-sm-3 mb-2">
						<input class="form-control" type="text" name="keyword" size="30" autofocus placeholder="Enter Keyword" autocomplete="off" required>
					</div>
					<button class="btn btn-outline-info mb-2" type="submit" name="search">Search</button>
				</form>
			</div>
		</form>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-12">

				<!-- table -->
				<div class="container">
					<div class="row justify-content-center">
						<table border="1" cellpadding="10" cellspacing="0" class="table" style="text-align:center">
							<thead class="thead-dark">
								<tr>
									<th scope="col">No.</th>
									<th scope="col">Code</th>
									<th scope="col">Picture</th>
									<th scope="col">Name</th>
									<th scope="col">Effort</th>
									<th scope="col">Condition</th>
									<th scope="col">Status</th>
									<th scope="col">Option</th>
								</tr>
							</thead>

							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($worker as $wk) : ?>
									<tr class="table-active">
										<td><?= $i + $dataAwal; ?></td>
										<td><?= $wk["code_card"]; ?></td>
										<td>
											<img src="img/<?= $wk["picture_card"]; ?>" width="170">
										</td>
										<td><?= $wk["name_card"]; ?></td>
										<td><?= $wk["effort_card"]; ?></td>
										<td><?= $wk["condition_card"]; ?></td>
										<td><?= $wk["status_card"]; ?></td>
										<td>
											<a class="btn btn-outline-primary" href="edit.php?id_card=<?= $wk["id_card"]; ?>" role="button">Edit</a>
											<a class="btn btn-outline-danger" rhef="delete.php?id_card=<?= $wk["id_card"]; ?>" onclick="return confirm('Are You Sure?');">Delete</a>
										</td>
									</tr>
									<?php $i++; ?>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

					<!-- Pagination -->
					<nav aria-label="Page navigation example">
						<ul class="pagination justify-content-center">

							<!-- Navigation ori -->

							<!-- tombol ditekan -->

							<?php if (isset($_POST["keyword"])) : ?>

								<!-- tombol tidak ditekan -->
							<?php elseif (!isset($_POST['keyword'])) : ?>

								<!-- previous ori -->
								<?php if ($pageAktif > 1) : ?>
									<!-- ori -->
									<!-- <a href="?page<?php // echo $pageAktif - 1; 
														?>">&laquo;</a> -->

									<!-- modif -->
									<li class="page-item"><a class="page-link" href="?page=<?php echo $pageAktif - 1; ?>">Previous</a></li>

								<?php else : ?>
									<li class="page-item disabled"><a class="page-link" href="?page=<?php echo $pageAktif - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a></li>
								<?php endif; ?>

								<!-- number -->
								<?php for ($i = 1; $i <= $jumlahPage; $i++) : ?>
									<?php if ($i == $pageAktif) : ?>
										<!-- ori -->
										<!-- <a href="?page=<?php // echo $i; 
															?>" style="font-weight: : bold; color: red"><?php // echo $i; 
																															?></a> -->

										<!-- modif -->
										<li class="page-item active"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
									<?php else : ?>
										<!-- ori -->
										<!-- <a href="?page=<?php // echo $i; 
															?>"><?php // echo $i; 
																					?></a> -->

										<!-- modif -->
										<li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
									<?php endif; ?>
								<?php endfor;  ?>

								<!-- next -->
								<?php if ($pageAktif < $jumlahPage) : ?>
									<!-- ori -->
									<!-- <a href="?page<?php // echo $pageAktif + 1; 
														?>">&raquo;</a> -->

									<!-- modif -->
									<li class="page-item"><a class="page-link" href="?page=<?php echo $pageAktif + 1; ?>">Next</a></li>

								<?php else : ?>
									<li class="page-item disabled"><a class="page-link" href="?page=<?php echo $pageAktif + 1; ?>" tabindex="-1" aria-disabled="true">Next</a></li>
								<?php endif; ?>
							<?php endif; ?>
							<!-- tutup -->
						</ul>
					</nav>


				</div>

			</div>
		</div>
	</div>


</body>

</html>