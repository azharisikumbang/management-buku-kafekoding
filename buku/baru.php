<?php 

session_start(); 

if (!isset($_SESSION['nama'])) {
	header('Location: /akun/masuk.php', true, 301);
	exit();
}
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
		<h1>Management Buku</h1>
		<form action="simpan.php" method="post">
			<div style="margin-bottom: 10px;">
				<div style="margin-bottom: 6px;">
					<label>Judul Buku</label>
				</div>
				<input type="text" name="judul" required="" style="width: 97%; padding: 10px 12px">
			</div>
			<div style="margin-bottom: 10px;">
				<div style="margin-bottom: 6px;">
					<label>Penulis</label>
				</div>
				<input type="text" name="penulis" style="width: 97%; padding: 10px 12px">
			</div>
			<div style="margin-bottom: 10px;">
				<div style="margin-bottom: 6px;">
					<label>Penerbit</label>
				</div>
				<input type="text" name="penerbit" style="width: 97%; padding: 10px 12px">
			</div>
			<div style="margin-bottom: 10px;">
				<div style="margin-bottom: 6px;">
					<label>Tahun Terbit</label>
				</div>
				<input type="number" name="tahun" style="width: 97%; padding: 10px 12px">
			</div>
			<div>
				<input type="submit" name="" value="Simpan" style="padding: 12px 20px;">
			</div>
		</form>
	</div>
</body>
</html>