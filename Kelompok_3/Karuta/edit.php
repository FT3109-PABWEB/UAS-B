<?php

require 'functions.php';
require 'desain.php';

// ambil data di URL
$id = $_GET["id_card"];

// query mahasiswa berdasarkan id
$wk = query("SELECT * FROM worker WHERE id_card = '$id'")[0];

if (isset($_POST["submit"])) {

    // cek data berhasil ditambahkan atau tidak
    if (edit($_POST) > 0) {
        echo "
        <script>
            alert('Edited');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Failed to edit');
            document.location.href = 'index.php'
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Worker</title>
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

    <!-- jadul -->
    <div class="container">

        <h2><br>Edit Data Worker<br></h2>

    </div>

    <br>

    <!-- form -->
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">

            <!-- hidden input -->
            <input type="hidden" name="id_card" value="<?= $wk["id_card"]; ?>">
            <input type="hidden" name="oldPicture" value="<?= $wk["picture_card"]; ?>">

            <!-- row -->
            <div class="row">

                <!-- 1 -->
                <!-- col-3 -->
                <div class="col-3">

                    <!-- code -->
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" name="code_card" id="code" required value="<?= $wk["code_card"]; ?>">
                    </div>

                    <!-- name -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name_card" id="name" required value="<?= $wk["name_card"]; ?>">
                    </div>

                    <!-- effort -->
                    <div class="form-group">
                        <label for="effort">Effort</label>
                        <input type="text" class="form-control" name="effort_card" id="effort" required value="<?= $wk["effort_card"]; ?>">
                    </div>

                </div>


                <!-- 2 -->
                <!-- col-3 -->
                <div class="col-3">

                    <!-- condition -->
                    <div class="form-group">
                        <label for="condition">Condition</label>

                        <select class="form-control" name="condition_card" id="condition" required>
                            <option selected><?= $wk["condition_card"]; ?></option>
                            <option>Damaged (----)</option>
                            <option>Poor (*---)</option>
                            <option>Good (**--)</option>
                            <option>Excellent (***-)</option>
                            <option>Mint (****)</option>
                        </select>
                        <small id="condition" class="form-text text-muted">Ignore duplicate <?= $wk["condition_card"]; ?> value</small>
                        <small id="condition" class="form-text text-muted">If you want to change, just choose the new one</small>
                    </div>

                </div>

                <!-- 3 -->
                <!-- col-3 -->
                <div class="col-3">

                    <!-- status -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status_card" id="status" required>
                            <option selected><?= $wk["status_card"]; ?></option>
                            <option>Healthy</option>
                            <option>Injured</option>
                        </select>
                        <small id="status" class="form-text text-muted">Ignore duplicate <?= $wk["status_card"]; ?> value</small>
                        <small id="status" class="form-text text-muted">If you want to change, just choose the new one</small>
                    </div>

                </div>

                <!-- 4 -->
                <div class="col">

                    <!-- picture -->
                    <div class="form-group">
                        <label for="picture">Picture</label>
                        <input type="file" name="picture_card" class="form-control-file" id="picture">
                    </div>

                    <!-- button -->
                    <button type="submit" name="submit" class="btn btn-dark">Submit</button>

                    <br><br>

                    <!-- old pict preview -->
                    <label for="Preview">Preview</label>
                    <br>
                    <img src="img/<?= $wk["picture_card"]; ?>" width="170">

                </div>

            </div>
        </form>

    </div>

</body>

</html>