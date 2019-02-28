<?php
session_start();
class Controller_Profile extends Controller
{
	function __construct()
	{
		$this->model = new Model_Profile();
		$this->view = new View();
	}
	
	function action_index()
	{
		if (!isset($_SESSION['id'])) {
			header("Location:/");
		}
		$data = $this->model->get_data();
		$this->view->generate('profile_view.php', 'template_view.php', $data);
	}

	function action_change_pic() {
		$id = $_SESSION['id'];
		$root = $_SERVER['DOCUMENT_ROOT'];
		include "$root/application/lib/bd.php";
		$uploaddir = "$root/profile_pics/";	
		$type = explode("/", $_FILES['uploadfile']['type']);
		$name =  strval($id) . "pic".".$type";
		$uploadfile = $uploaddir . $name;
		copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
		$query = mysqli_query($db, "UPDATE users SET pic='$name' WHERE id='$id'");
		header('Location:/profile');
	}
}