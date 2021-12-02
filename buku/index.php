<?php 
session_start(); 

if (!isset($_SESSION['nama'])) {
	header('Location: /akun/masuk.php', true, 301);
	exit();
}

require_once '../library/koneksi.php';


$stmt = mysqli_query($conn, "SELECT * from buku");
$result = [];

while ($fetch = mysqli_fetch_assoc($stmt)) {
	$result[] = $fetch;
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Buku</title>
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
		<div>
			<h1>Daftar Buku</h1>
			<table style="width: 100%; border-collapse: collapse;" border="1">
				<thead>
					<tr>
						<th style="padding: 8px 0px">No</th>
						<th>Judul</th>
						<th>Penulis</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no = 1;
						foreach($result as $buku) { ?>
						<tr>
							<td style="text-align: center; padding: 8px 0px"><?php echo $no++; ?></td>
							<td>
								<a href="lihat.php?id=<?php echo $buku['id'] ?>">
									<?php echo $buku['judul'] ?>
								</a>
								</td>
							<td><?php echo $buku['penulis'] ?></td>
							<td style="text-align: center">
								<a href="edit.php?id=<?php echo $buku['id'] ?>">Edit</a> | 
								<a href="hapus.php?id=<?php echo $buku['id'] ?>">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>