<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'tbs');

if (!$_SESSION['user']){
    header('Location: Login.php');
}

else{
        if (isset($_POST['add'])){
            $title = $_POST['title'];
            $content = $_POST['content'];
            $user = $_SESSION['user'];
            $date = date("Y-m-d");
        $req="INSERT INTO news (title,content,author,posted_date) VALUES ('$title','$content','$user','$date') ";
        $res = mysqli_query($conn,$req);
        if($res){
            header('Location: news.php');
        }else{
          header('Location: add_news.php?='.$content);
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
        <h5 class="text-center">Add your news  !</h5>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">@Author</span>
  </div>
  <input type="text" readonly class="form-control" value="<?php echo $_SESSION['user'] ?> "  >
</div>



<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Article Title</span>
  </div>
  <input type="text" class="form-control" name="title">
  
</div>

<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Article Content</span>
  </div>
  <textarea class="form-control" name="content"></textarea>
</div>
  <br>
  
  <input style="float: right;" class="btn btn-primary" type="submit" value="Add Article" name="add"  >
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