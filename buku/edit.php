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
	<title></title>
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
		<h1>Management Buku - Edit</h1>
		<form action="update.php" method="post">
			<div style="margin-bottom: 10px;">
				<div style="margin-bottom: 6px;">
					<label>Judul Buku</label>
				</div>
				<input type="hidden" name="id" value="<?php echo $buku['id'] ?>">
				<input type="text" name="judul" value="<?php echo $buku['judul'] ?>" style="width: 97%; padding: 10px 12px">
			</div>
			<div style="margin-bottom: 10px;">
				<div style="margin-bottom: 6px;">
					<label>Penerbit</label>
				</div>
				<input type="text" name="penulis" value="<?php echo $buku['penulis'] ?>" style="width: 97%; padding: 10px 12px">
			</div>
			<div style="margin-bottom: 10px;">
				<div style="margin-bottom: 6px;">
					<label>Penerbit</label>
				</div>
				<input type="text" name="penerbit" value="<?php echo $buku['penerbit'] ?>" style="width: 97%; padding: 10px 12px">
			</div>
			<div style="margin-bottom: 10px;">
				<div style="margin-bottom: 6px;">
					<label>Tahun Terbit</label>
				</div>
				<input type="number" name="tahun" value="<?php echo $buku['tahun'] ?>" style="width: 97%; padding: 10px 12px">
			</div>
			<div>
				<input type="submit" name="" value="Simpan" style="padding: 12px 20px;">
				<a href="/buku/index.php">Kembali</a>
			</div>
		</form>
	</div>
</body>
</html>