<?php


session_start();
$conn = mysqli_connect('localhost', 'root', '', 'tbs');
if (!$_SESSION['user']){
    header('Location: Login.php');
}

else{
		$user = $_GET['user'];
		if ($_GET['status']=='yes'){
			$req = "UPDATE users set active=1 WHERE username='$user'";}
		else{
			$req = "UPDATE users set active=0 WHERE username='$user'";
		}
		$res= mysqli_query($conn,$req);
		if($res){
			header('Location: manage_users.php');
		}
}

?>
