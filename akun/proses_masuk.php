<?php 

session_start(); 

if (isset($_SESSION['nama'])) {
	header('Location: /buku/index.php', true, 301);
	exit();
}

require_once '../library/koneksi.php';

$stmt = mysqli_prepare($conn, "SELECT * from akun where email = ?");

mysqli_stmt_bind_param($stmt, "s", $_POST['email']);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$akun = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);
mysqli_close($conn);

$isValid = password_verify($_POST['sandi'], $akun['sandi']);

if (!$isValid) {
	// lakukan sesuatu jika login tidak berhasil, misal email atau kata sandi salah
	header('Location: /akun/masuk.php', true, 301);
	exit();
}

session_start();
$_SESSION['nama'] = $akun['nama'];
$_SESSION['email'] = $akun['email'];

header('Location: /buku/index.php', true, 301);
