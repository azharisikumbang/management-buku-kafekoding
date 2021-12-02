<?php 

session_start(); 

if (!isset($_SESSION['nama'])) {
	header('Location: /akun/masuk.php', true, 301);
	exit();
}

require_once '../library/koneksi.php';

$stmt = mysqli_prepare($conn, "UPDATE buku SET judul = ?, penulis = ?, penerbit = ?, tahun = ? WHERE id = ?");
mysqli_stmt_bind_param($stmt, 
	"ssssi", 
	$_POST['judul'],
	$_POST['penulis'],
	$_POST['penerbit'],
	$_POST['tahun'],
	$_POST['id'],
);
mysqli_stmt_execute($stmt);

header('Location: /buku/lihat.php?id=' . $_POST['id'], true, 301);
exit();