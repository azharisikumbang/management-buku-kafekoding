<?php 

session_start(); 

if (isset($_SESSION['nama'])) {
	header('Location: /buku/index.php', true, 301);
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftarkan Akun</title>
</head>
<body style="background:#f0f0f0">
	<div 
		style="width: 512px; margin:60px auto; background-color: white; padding: 10px 20px 40px; border-radius: 8px"
	>
		<h1>Daftarkan akun</h1>
		<form action="proses_daftar.php" method="post">
			<div style="margin-bottom: 10px;">
				<div style="margin-bottom: 6px;">
					<label>Nama Lengkap</label>
				</div>
				<input type="text" name="nama" required="" style="width: 92%; padding: 10px 12px">
			</div>
			<div style="margin-bottom: 10px;">
				<div style="margin-bottom: 6px;">
					<label>Email Pengguna</label>
				</div>
				<input type="email" name="email" required="" style="width: 92%; padding: 10px 12px">
			</div>
			<div style="margin-bottom: 10px;">
				<div style="margin-bottom: 6px;">
					<label>Kata Sandi</label>
				</div>
				<input type="password" name="sandi" required="" style="width: 92%; padding: 10px 12px">
			</div>
			<div>
				<input type="submit" value="Daftarkan" style="padding: 12px 20px;">
			</div>
		</form>
	</div>
</body>
</html>