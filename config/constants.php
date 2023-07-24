<!-- sql connection -->
<?php 
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="CRUD-db";
$conn=mysqli_connect($servername,$username,$password,$dbname);
  if ($conn) 
  {
   // echo "connection ok";
  }
  else
  {
    die("connection failed because".mysqli_connect_error());
  }
?>

<!-- head -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title><?php echo $page_title ;?></title>
    <script src="https://kit.fontawesome.com/4ebe883bff.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>

<!-- home button for employee -->
<div class="flex employee">
    <div>  </div>
      <div class="btn-group">
        <a href="home.php" class="btn btn-primary">Home</a>
      </div>
  </div>
    <br><br>

<!-- home button for admin -->
<div class="flex admin">
    <div>  </div>
      <div class="btn-group">
        <a href="dashboard.php" class="btn btn-primary">Home</a>
      </div>
  </div>
    <br><br>