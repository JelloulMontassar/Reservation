<?php


session_start();
$conn = mysqli_connect('localhost', 'root', '', 'tbs');
if (!$_SESSION['user']){
    header('Location: Login.php');
}

else{
		$idevent = $_GET['id'];
		$user = $_SESSION['user'];
		$req3 = "SELECT organizer from events WHERE idevent=$idevent";
		$res3 = mysqli_query($conn,$req3);
		$row = mysqli_fetch_array($res3,MYSQLI_BOTH);
		$org = $row[0];
		$req = "UPDATE events SET nbseats=nbseats+1 WHERE (idevent=$idevent and organizer='$org')";
		$res = mysqli_query($conn,$req);
		$req1 = "DELETE FROM reservations WHERE idevent=$idevent and username='$user'";
		$res1 = mysqli_query($conn,$req1);
		if($res&&$res1){
			header('Location: my_archive.php');
		}
		else{
			echo $res1;
		}

}

?>
