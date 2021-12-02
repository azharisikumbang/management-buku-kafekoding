<?php 

$conn = mysqli_connect('localhost', 'root', '', 'management_buku');

if (mysqli_connect_errno()) {
	echo "Database Error : " . mysqli_connect_error();
}
