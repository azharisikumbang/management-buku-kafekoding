<?php 

session_start(); 

if (isset($_SESSION['nama'])) {
	header('Location: /buku/index.php', true, 301);
	exit();
}

require_once '../library/koneksi.php';

$stmt = mysqli_prepare($conn, "INSERT INTO akun (nama, email, sandi)  VALUES (?, ?, ?)");

mysqli_stmt_bind_param($stmt, 
	'sss', 
	$_POST['nama'],
	$_POST['email'],
	password_hash($_POST['sandi'], PASSWORD_DEFAULT)
);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($conn);

header('Location: /akun/masuk.php', true, 301);