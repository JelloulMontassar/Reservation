<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'tbs');

if (!$_SESSION['user']){
    header('Location: Login.php');
}

else{
        if (isset($_POST['add'])){
            $ename = $_POST['ename'];
            $eplace = $_POST['eplace'];
            $org = $_SESSION['user'];
            $eclub = $_POST['eclub'];
            $ec = $_POST['ec'];
            $nbs = $_POST['nbs'];

        $req="INSERT INTO events(event_name,place,categorie,club_name,organizer,nbseats) 
            VALUES('$ename','$eplace','$ec','$eclub','$org',$nbs)
        ";
        $res = mysqli_query($conn,$req);
        if($res){
            header('Location: all_events.php');
        }

    
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
      <div class="col-sm-9 col-md-7 col-lg-10 mx-auto">
        <h5 class="text-center">Add your event and let the word see your work  !</h5>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label >Event Name</label>
      <input type="text" class="form-control" placeholder="Event Name" name="ename"  required>
    </div>
    <div class="col-md-4 mb-3">
      <label >Place</label>
      <input type="text" class="form-control"  placeholder="Place" name="eplace" required>
    </div>
    <div class="col-md-4 mb-3">
      <label >Organizer</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" >@</span>
        </div>
        <input type="text" class="form-control" placeholder="Username" value="<?php echo($_SESSION['user'])?>" readonly="" >
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label>Club Name</label>
      <input type="text" class="form-control" placeholder="Club Name" name="eclub" readonly="" required value="<?php echo $_SESSION['clubname'] ?>" >
    </div>
    <div class="col-md-3 mb-3">
      <label >Event Categorie</label>
      <input name="ec" type="text" class="form-control" placeholder="Event Categorie" required>
    </div>
    <div class="col-md-3 mb-3">
      <label >Number Of Seats</label>
      <input name="nbs" type="text" class="form-control" placeholder="Number Of Seats"  required>
    </div>
    
  </div>
  
  <input style="float: right;" class="btn btn-primary" type="submit" value="Add Event" name="add"  >
</form>
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