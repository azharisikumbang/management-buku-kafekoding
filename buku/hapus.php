<?php 

session_start(); 

if (!isset($_SESSION['nama'])) {
	header('Location: /akun/masuk.php', true, 301);
	exit();
}

require_once '../library/koneksi.php';

$stmt = mysqli_prepare($conn, "DELETE FROM buku WHERE id = ?");
mysqli_stmt_bind_param($stmt, 
	"i",
	$_GET['id'],
);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

header('Location: /buku/index.php', true, 301);
exit();