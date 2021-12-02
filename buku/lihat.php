<?php 
session_start(); 

if (!isset($_SESSION['nama'])) {
	header('Location: /akun/masuk.php', true, 301);
	exit();
}
require_once '../library/koneksi.php';

$stmt = mysqli_prepare($conn, "SELECT * from buku where id = ?");

mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$buku = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Buku</title>
</head>
<body style="background: #f0f0f0">
	<div style="width: 960px; margin:20px auto; background-color: white; padding: 10px 20px 40px; border-radius: 8px">
		<div style="display: grid; grid-template-columns: auto auto; border-bottom: 2px solid #eee; padding:0; padding-bottom: 10px;">
			<div>
				<ul style="padding:0; list-style-type: none;">
					<li style="display: inline-block; padding: 0px 8px">
						<a href="/buku/index.php">Daftar Buku</a>
					</li>
					<li style="display: inline-block; padding: 0px 8px">
						<a href="/buku/baru.php">Tambah Buku</a>
					</li>
				</ul>
			</div>
			<div style="text-align: right; padding: 16px 0">
				<span>
					Anda masuk sebagai <i><?php echo $_SESSION['nama'] ?></i> | <a href="/akun/keluar.php">Keluar</a>
				</span>
			</div>
		</div>
		<h1>Daftar Buku</h1>
		<div>
			<table>
				<tr>
					<td style="width: 120px; padding-bottom: 12px">Judul Buku</td>
					<td>: <?php echo $buku['judul'] ?></td>
				</tr>
				<tr>
					<td style="width: 120px; padding-bottom: 12px">Penulis Buku</td>
					<td>: <?php echo $buku['penulis'] ?></td>
				</tr>
				<tr>
					<td style="width: 120px; padding-bottom: 12px">Penerbit Buku</td>
					<td>: <?php echo $buku['penerbit'] ?></td>
				</tr>
				<tr>
					<td style="width: 120px; padding-bottom: 12px">Tahun Terbit</td>
					<td>: <?php echo $buku['tahun'] ?></td>
				</tr>
				<tr>
					<td style="width: 120px; padding-bottom: 12px" colspan="2">
						<a href="edit.php?id=<?php echo $buku['id'] ?>">Edit</a> | 
						<a href="hapus.php?id=<?php echo $buku['id'] ?>">Hapus</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>