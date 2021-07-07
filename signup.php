<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'tbs');
$connect="";
if (isset($_POST['join'])){
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    $cname = $_POST['cname'];
    $Role = $_POST['Role'];
    $active=1;

    if ($Role=="student"){
      $req = "INSERT INTO users  VALUES('$user','$pwd','$Role','$cname',$active)";
    }
    else{
      $active=0;
      $req = "INSERT INTO users  VALUES('$user','$pwd','$Role','$cname',$active)";
    }
    $res = mysqli_query($conn,$req);
    if (!$res) {
      header('Location: signup.php');
    }
    if($res&&$active==0){
        header('Location: login.php?active=no');
    }
    else{
        header('Location: login.php?active=yes');
    }

    
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
            <h5 class="card-title text-center">Sign Up</h5>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
              <div class="mb-3">
                <?php
                    if ($connect=='failed') {
                        echo '<div class="alert alert-danger" role="alert">Wrong username/password !</div>';
                    }
                ?>
               <div class="alert alert-info" role="alert">
                  <p>Leave the Club Name field blank if you're not a memeber of club or not a Club President</p>
                </div>

                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="user" required="">
                
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control"  name="pwd" required="">
                 </div>
                 <div class="mb-3">
                    <label class="form-label">Club Name</label>
                    <input type="test" class="form-control"  name="cname">
                 </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="Role" value="student" required="">
                      <label class="form-check-label" > Student</label>
                  </div>
                 <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="Role" value="cp" required="">
                      <label class="form-check-label" >Club President</label>
                  </div>
                 
                 <br>
                <input type="submit" class="btn btn-primary" style="float: right;" value="Join Us" name="join">
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