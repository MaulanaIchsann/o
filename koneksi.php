<?php
$servername = "localhost";
$database = "db_users";
$username = "root";
$password = "";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error);
} else {
    echo "Koneksi Berhasil";
}
?>