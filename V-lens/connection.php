<?php

$connection = mysqli_connect('localhost', 'root', '', 'v_lens_db');
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
