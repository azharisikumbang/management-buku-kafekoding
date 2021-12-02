CREATE TABLE `buku` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL
);

CREATE TABLE `akun` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`email` varchar(255) UNIQUE,
	`sandi` varchar(255),
	`nama` varchar(255)
);
