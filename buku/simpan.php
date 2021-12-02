<?php 

session_start(); 

if (!isset($_SESSION['nama'])) {
	header('Location: /akun/masuk.php', true, 301);
	exit();
}

require_once '../library/koneksi.php';

$stmt = mysqli_prepare($conn, "INSERT INTO buku (judul, penulis, penerbit, tahun)  VALUES (?, ?, ?, ?)");

mysqli_stmt_bind_param($stmt, 
	'ssss', 
	$_POST['judul'],
	$_POST['penulis'],
	$_POST['penerbit'],
	$_POST['tahun']
);

mysqli_stmt_execute($stmt);

header('Location: /buku/index.php', true, 301);