<?php
session_start();
class Controller_Main extends Controller
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
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}

	function action_login()
	{
		$root = $_SERVER['DOCUMENT_ROOT'];
		include "$root/application/lib/bd.php";
		if (isset($_POST['login']) && isset($_POST['password'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];
			$query = "SELECT * FROM users WHERE login='$login'";
			$result = mysqli_query($db, $query);
			$res = mysqli_fetch_array($result);
			if ($res['id'] && password_verify($password, $res['password'])) {
				$_SESSION['id'] = $res['id'];
				header('Location:/profile');
			} else {
				header("Location:/");
			}
		} else {
			header("Location:/");
		}
	}

	function action_exit($value='')
	{
		session_destroy();
		$_SESSION = array();
		header("Location:/");
	}
}
?>