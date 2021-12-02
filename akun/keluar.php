<?php 

session_start();
unset($_SESSION['nama']);
unset($_SESSION['email']);

header('Location: /akun/masuk.php', true, 301);
exit();