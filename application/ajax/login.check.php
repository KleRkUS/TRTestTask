<?php
	$root = $_SERVER['DOCUMENT_ROOT'];
	include "$root/application/lib/bd.php";
	$login = $_REQUEST['login'];
	$query = "SELECT * FROM users WHERE login='$login'";
	$result = mysqli_query($db, $query);
	if ($res = mysqli_fetch_array($result)) {
		echo "This login is in use";
	} else {
		echo "Correct login";
	}
?>