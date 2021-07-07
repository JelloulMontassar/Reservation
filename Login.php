<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'tbs');
$connect="";
if(empty($_SESSION['user'])){
if (isset($_POST['Connect'])){
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];

  
    $req = " SELECT * FROM users WHERE username='$user' and password='$pwd'";
    $res = mysqli_query($conn,$req);
    $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
    if(mysqli_num_rows($res)==1){
       if($row['active']==1){ 
            $_SESSION['Connected'] = 1;
            $_SESSION["role"] = $row['role'];
            $_SESSION['user'] = $row['username'];
            $_SESSION['clubname'] = $row['club_name'];

            header('Location: index.php');
        }
        else{
            header('Location: Login.php?active=no');
        }
    }
    else{
        $connect='failed';
    }

    
}}
else{
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Event Reservation and News.</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
     <?php
     	require 'header.php';
     ?>
    <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
              <div class="mb-3">
                <?php
                    if ($connect=='failed') {
                        echo '<div class="alert alert-danger text-center" role="alert">Wrong username/password !</div>';
                    }
                ?>
                <?php
                    if (isset($_GET['active'])) {
                        if($_GET['active']=="yes"){
                            echo '<div class="alert alert-success text-center" role="alert">Signup success.</div>';
                        }
                        else{
                        echo '<div class="alert alert-danger" role="alert">You account is not active yet!</div>';}
                    }
                ?>
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" name="user">
                
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control"  name="pwd">
                 </div>
                <input type="submit" class="btn btn-primary" style="float: right;" value="Submit" name="Connect">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

        <!--footer-->
     <?php
        require 'footer.php';
            ?>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
 </html>