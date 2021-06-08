<?php

require 'functions.php';

$id = $_GET["id_card"];

if (delete($id) > 0) {
    echo "
    <script>
        alert('Deleted');
        document.location.href = 'index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Failed to Delete');
        document.location.href = 'index.php'
    </script>
    ";
}
