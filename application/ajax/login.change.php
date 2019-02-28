<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	include "$root/application/lib/bd.php";
	$login = $_REQUEST['login'];
	$id = $_SESSION['id'];
	$query = "SELECT * FROM users WHERE login='$login'";
	$result = mysqli_query($db, $query);
	if ($res = mysqli_fetch_array($result)) {
		echo 'Login is in use';
	}  else {
		$query = "UPDATE users SET login='$login' WHERE id='$id'";
		$result = mysqli_query($db, $query);
		echo 'Correct login';
	}
?>