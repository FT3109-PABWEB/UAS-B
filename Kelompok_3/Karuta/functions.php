<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "karuta");

function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function add($data)
{
	$code = htmlspecialchars($data["code_card"]);

	$name = htmlspecialchars($data["name_card"]);
	$effort = htmlspecialchars($data["effort_card"]);
	$condition = htmlspecialchars($data["condition_card"]);
	$status = htmlspecialchars($data["status_card"]);

	// $picture = htmlspecialchars($data["picture_card"]); // gambar yang dulu


	// uploads picture

	$picture = upload();

	if (!$picture) {
		return false;
	}

	// insert data
	global $conn;
	$query = "INSERT INTO worker VALUES ('', '$code', '$picture', '$name', '$effort', '$condition', '$status')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload()
{
	$nameFile = $_FILES['picture_card']['name'];
	$sizeFile = $_FILES['picture_card']['size'];
	$error = $_FILES['picture_card']['error'];
	$tmpFile = $_FILES['picture_card']['tmp_name'];

	// check picture di upload tau tidak
	if ($error === 4) {
		echo "
			<script>
				alert('Pls Add Some Picture');
			</script>
			";

		return false;
	}

	// cek yang diupload gambar atau bukan
	$extensionPictureValid = ['jpg', 'jpeg', 'png'];
	$extensionPicture = explode('.', $nameFile);
	$extensionPicture = strtolower(end($extensionPicture));

	if (!in_array($extensionPicture, $extensionPictureValid)) {
		echo "
			<script>
				alert('Not a picture, Try Again')
			</script>
			";
		return false;
	}

	// cek apakah ukuran gambar terllau besar
	if ($sizeFile > 1000000) {
		echo "
			<script>
				alert('Size File too Big')
			</script>
			";
		return false;
	}

	// lolos pengecekan gambar
	// jika ingin name picture tidak berubah menjadi random

	// tapi ada kekurangannya
	// kekurangannya dimana ada nama gambar yang sama di database
	// maka gambar yang lama akan ditimpa
	move_uploaded_file($tmpFile, 'img/' . $nameFile);
	return $nameFile;

	// generate name picture baru
	// $newNameFile = uniqid();
	// $newNameFile .= '.';
	// $newNameFile .= $extensionPicture;
	// move_uploaded_file($tmpFile, 'img/' . $newNameFile);

	// return $newNameFile;
}

function delete($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM worker WHERE id_card = '$id'");
	return mysqli_affected_rows($conn);
}

function edit($data)
{
	global $conn;
	$id = $data["id_card"];
	$code = htmlspecialchars($data["code_card"]);

	$name = htmlspecialchars($data["name_card"]);
	$effort = htmlspecialchars($data["effort_card"]);
	$condition = htmlspecialchars($data["condition_card"]);
	$status = htmlspecialchars($data["status_card"]);

	$oldPicture = htmlspecialchars($data["oldPicture"]);


	// cek apakah user pilih gambar baru atau tidak
	if ($_FILES['picture_card']['error'] === 4) {
		$picture = $oldPicture;
	} else {
		$picture = upload();
	}


	// insert data
	$query = "UPDATE worker SET 
					code_card = '$code', 
					picture_card = '$picture', 
					name_card = '$name', 
					effort_card = '$effort', 
					condition_card = '$condition', 
					status_card = '$status'
				WHERE id_card = $id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

// ori

function search($keyword)
{
	$query = "SELECT * FROM worker 
				WHERE 
			code_card LIKE '%$keyword%' OR
			name_card LIKE '%$keyword%' OR
			effort_card LIKE '%$keyword%' OR
			condition_card LIKE '%$keyword%' OR
			status_card LIKE '%$keyword%'
			"
			;


	return query($query);
}

// FUNGSI UNTUK MENCARI DATA DENGAN LIMIT
// function search2 ($keyword, $dataAwal, $jumlahDataPerPage){
// 	$query = "SELECT * FROM worker 
// 				WHERE 
// 			code_card LIKE '%$keyword%' OR
// 			name_card LIKE '%$keyword%' OR
// 			effort_card LIKE '%$keyword%' OR
// 			condition_card LIKE '%$keyword%' OR
// 			status_card LIKE '%$keyword%' ORDER BY id DESC LIMIT $dataAwal, $jumlahDataPerPage";
// 	return query($query);
// } 