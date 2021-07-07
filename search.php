<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'tbs');
$search = $_POST['s'];
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
<br>
 <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-10 mx-auto">
        <div class="alert alert-success text-center" role="alert" >
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg> We found <?php
                  $req = "SELECT * FROM news WHERE title LIKE '%$search%' OR content LIKE '%$search%' OR author LIKE '%$search%' ";
                  $res = mysqli_query($conn,$req); 
                  echo mysqli_num_rows($res);
                  ?>  
                  results for : <?php echo $search; ?>
</div>
       <hr>
            <div class="post-preview">
                        <a href="#">
                <?php
                  $req = "SELECT * FROM news WHERE title LIKE '%$search%' OR content LIKE '%$search%' OR author LIKE '%$search%' ";
                  $res = mysqli_query($conn,$req);
                  while($row = mysqli_fetch_array($res,MYSQLI_BOTH)){
                    echo '
                           <div class="post-preview">
                        <a href="#">
                            <h2 class="post-title">'.$row[1].'</h2>
                            <p class="post-subtitle">'.$row[2].'</p>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">'.$row[3].'</a>
                            on '.$row[4].'</p>
                    </div>
                    <hr>';}
                    ?>
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