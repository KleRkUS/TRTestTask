<?php
session_start();
class Model_Profile extends Model
{
	public function get_data()
	{	
		$id = $_SESSION['id'];
		$root = $_SERVER['DOCUMENT_ROOT'];
		include "$root/application/lib/bd.php";
		$query = "SELECT * FROM users WHERE id='$id'";
		$result = mysqli_query($db, $query);
		$res = mysqli_fetch_array($result);
		$priveleges = $res['priveleges'];
				switch ($priveleges){
					case "0":
						$res['priveleges'] = 'User';
						$res['color'] = '#000';
						$res['changeName'] = false;
						break;
					case "1":
						$res['priveleges'] = 'Moderator';
						$res['color'] = 'green';
						$res['changeName'] = true;
						break;
					case "2":
						$res['priveleges'] = 'Admin';
						$res['color'] = 'red';	
						$res['changeName'] = true;
						break;
					default:
					 	$res['priveleges'] = 'User';
						$res['color'] = '#000';
						$res['changeName'] = false;
						break;
				}
		return $res;
	}
}