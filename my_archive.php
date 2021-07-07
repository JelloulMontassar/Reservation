<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'tbs');
if (!$_SESSION['user']){
    header('Location: Login.php');
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
       
            <h5 class="text-center">Reserved Events !</h5>
           
                 <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Event Name</th>
               
                  <th scope="col">Club Name</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $user = $_SESSION['user'];
                $req = "SELECT r.idevent,event_name,club_name FROM events ,reservations r WHERE r.username='$user' and r.idevent=events.idevent";
                $res = mysqli_query($conn,$req);
                while($row = mysqli_fetch_array($res,MYSQLI_BOTH)){
                echo "
                <tr>
                  
                  <td>$row[1]</td>
                  <td>$row[2]</td>
                
                <td><a href='unres.php?id=$row[0]'><span class='badge badge-success'>Reserved</span></a></td>
               </tr>";
                };
                ?>
              </tbody>
            </table>
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