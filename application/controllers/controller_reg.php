<?php
session_start();
class Controller_Reg extends Controller
{
	function __construct()
	{
		$this->view = new View();
	}
	
	function action_index()
	{	

		if (isset($_SESSION['id'])) {
			header("Location:/profile");
		}
		$this->view->generate('reg_view.php', 'template_view.php', $data);
	}

	function action_registration() {
		$root = $_SERVER['DOCUMENT_ROOT'];
		include "$root/application/lib/bd.php";
		$key = $_SESSION['email-key'];
		if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['key']) && $key == $_POST['key']) {
			$login = $_POST['login'];
			$email = $_POST['email'];
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
			$queryCheck = "SELECT * FROM users WHERE login='$login' OR email='$email'";
			$resultCheck = mysqli_query($db, $queryCheck);
			if ($resCheck = mysqli_fetch_array($resultCheck)) {
				header("Location:/reg");
			} else {
				$query = "INSERT INTO users (login, password, email, priveleges) VALUES ('$login', '$password', '$email', '0')";
				$result = mysqli_query($db, $query);
				echo "<script>location.replace('/')</script>";
			}
		} else {
			header('Location:/reg');
		}
	}
}
?>