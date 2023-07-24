<?php
	include("./config/constants.php");
  if (isset($_SESSION['login_faild'])) {
  $msg = $_SESSION['login_faild'];
  echo $msg;
  unset($msg);
  }
?>

<style>
  .btn-group .btn-primary{
    display: none;
  }
</style>

<!DOCTYPE html>
<html lang="en">

<body>
  <div class="flex">
    <div>
      <h1>Login</h1>
    </div>
  </div>
    
    <section class="login-btn-sec">
        <div class="login-btn-box">
            <br>
            <h4>Login as employee :</h4><br><br>
            <form action="" method="POST">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                    <input name="emid" type="text" class="form-control" placeholder="Enter Id" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                    <input name="empass" type="password" class="form-control" placeholder="Enter Password" aria-label="Password" aria-describedby="basic-addon1">
                </div>
                <br>
                <input name="submit" class="btn btn-primary" type="submit" value="Login" aria-label=".form-control-sm example">
            </form>

        </div>
    </section>

   
    <br><br>
    <?php
				
			if(isset($_POST['submit']))	
			{
				$id=$_POST['emid'];
				$password=$_POST['empass'];
				$q="SELECT * FROM employee WHERE eid='$id' && epassword='$password' ";
				$res=mysqli_query($conn,$q);
				if($res->num_rows>0)
        {
					$_SESSION['eid']=$id;
					header('location:home.php');
        }
				else
				{
          $msg="<script>alert('Invalid ID or Password')</script>";
          echo $msg;
          unset($msg);
				}
			}	

	?>
</body>
</html>