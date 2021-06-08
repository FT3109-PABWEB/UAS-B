<?php

require 'functions.php';
require 'desain.php';

if (isset($_POST["submit"])) {

    // cek data berhasil ditambahkan atau tidak
    if (add($_POST) > 0) {
        echo "
        <script>
            alert('Added');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Failed');
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
    <title>Add Data Worker</title>
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

        <h2><br>Add Data Worker<br></h2>

    </div>

    <br>

    <!-- form -->
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">

            <!-- row -->
            <div class="row">

                <!-- 1 -->
                <!-- col-3 -->
                <div class="col-3">

                    <!-- code -->
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" name="code_card" id="code" required>
                    </div>

                    <!-- name -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name_card" id="name" required>
                    </div>

                    <!-- effort -->
                    <div class="form-group">
                        <label for="effort">Effort</label>
                        <input type="text" class="form-control" name="effort_card" id="effort" required>
                    </div>

                </div>


                <!-- 2 -->
                <!-- col-3 -->
                <div class="col-3">

                    <!-- condition -->
                    <div class="form-group">
                        <label for="condition">Condition</label>
                        <select class="form-control" name="condition_card" id="condition" required>
                            <option disabled selected>Choose...</option>
                            <option>Damaged (----)</option>
                            <option>Poor (*---)</option>
                            <option>Good (**--)</option>
                            <option>Excellent (***-)</option>
                            <option>Mint (****)</option>
                        </select>
                    </div>

                </div>

                <!-- 3 -->
                <!-- col-3 -->
                <div class="col-3">

                    <!-- status -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status_card" id="status" required>
                            <option disabled selected>Choose...</option>
                            <option>Healthy</option>
                            <option>Injured</option>
                        </select>
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

                </div>

            </div>
        </form>

    </div>


</body>

</html>