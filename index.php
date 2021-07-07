
<?php

session_start();

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
     <header class="masthead" style="background-image: url('https://hbr.org/resources/images/article_assets/2017/02/feb17-21-618737654.jpg')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="site-heading">
                            <h2>Event Reservation and News.</h2>
                            <span class="subheading">Here You Can Find Events Hosted in TBS and The Latest News</span>
                        </div>
                    </div>
                </div>
            </div>
    </header>
       <hr>
        <!-- Main Content-->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                	<div class="alert alert-dark text-center" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
  <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
  <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
</svg> You can find the latest news here
</div>
                    <div class="post-preview">
                        <a href="#">
                <?php
                  $req = "SELECT * FROM news ORDER BY posted_date DESC LIMIT 3";
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
                   
                    <!-- Pager-->
                    <div class="clearfix"><a class="btn btn-primary float-right" href="news.php">Older News →</a></div>
                </div>
            </div>
        </div>
        <hr />
        <!-- Footer-->
        <?php
        require 'footer.php';
    		?>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
