<?php
$page_title = "index"; 
include("./config/constants.php");
?>

<!DOCTYPE html>
<html lang="en">

<style>
a
{
    color: #ffffff;
    text-decoration: none;
}
a:hover
{
    color: #ffffff;
}
.employee,.admin
{
    display: none;
}
</style>

<body>
    
    <section class="login-btn-sec">
        <div class="login-btn-box text-center">
            <h3>Login as:</h3>
            <br>
            <div>
                <button type="button" class="btn btn-primary"><a href="alogin.php"> Admin </a></button>
            
                <button type="button" class="btn btn-primary"><a href="login.php"> Employee </a></button>
            </div>
           
        </div>
    </section>

</body>
</html> 