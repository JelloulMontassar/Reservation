<?php


session_start();
$conn = mysqli_connect('localhost', 'root', '', 'tbs');
if (!$_SESSION['user']){
    header('Location: Login.php');
}

else{
		$idevent = $_GET['id'];
		$user = $_SESSION['user'];
		$req1 = "SELECT * FROM reservations WHERE idevent=$idevent and username='$user'";
		$res1 = mysqli_query($conn,$req1);
		if(mysqli_num_rows($res1)>=1){
			header('Location: all_events.php?res=failed');
	    }
	    else{
	    	$req = "INSERT INTO reservations(idevent,username) 
	        		VALUES ($idevent,'$user')";
	        $res = mysqli_query($conn,$req);
	        $req2 = "UPDATE events SET nbseats=nbseats-1 WHERE idevent=$idevent";
	        $res2 = mysqli_query($conn,$req2);
		        if($res){
		            header('Location: my_archive.php');
		        }
	    }
}

?>




?>