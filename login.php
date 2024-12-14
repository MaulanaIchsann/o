<?php
session_start();
require 'koneksi.php';

// Inisialisasi counter jika belum ada
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

$username = $_POST["username"];
$password = $_POST["password"];

$query_sql = "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['login_attempts'] = 0; // Reset counter jika login berhasil
    header("Location: hcww.html");
} else {
    $_SESSION['login_attempts'] += 1;

    if ($_SESSION['login_attempts'] >= 3) {
        echo "<center><h1>Terlalu banyak percobaan login yang gagal. Silakan coba lagi nanti.</h1></center>";
        session_destroy(); // Hentikan sesi untuk mencegah percobaan lebih lanjut
        exit();
    } else {
        echo "<center><h1>Username atau Password salah. Coba lagi</h1>
            <button><strong><a href='index.html'>Login</a></strong></button></center>";
    }
}
?>
