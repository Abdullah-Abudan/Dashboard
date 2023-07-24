<?php
$page_title = "EmployeeList"; 

	include("./config/constants.php");
	include("./config/check_alogin.php");

if(isset($_SESSION['employee'])){ #message add employee
  echo $_SESSION['employee'];
  unset($_SESSION['employee']);
}		
?>

<style>
.employee{      /* حتى يخفي البتن الخاص بالإيمبلوي ويأخذ البتن الخاص بالآدمن يلي رح يحولني ع الداش بوورد */
  display: none;
  }
</style>

<!DOCTYPE html>
<html lang="en">

<body>
  <div class="d-flex mb-3" id="head-sec">
    <div class="p-2">
      <h2>All Employee</h2>
    </div> 
    <div class="p-3"> 
      <a class="btn btn-success" href="insert.php" role="button">Add new</a>
    </div>

    <div class="row ms-auto">
      <div class="col-md-12">
        <form class="d-flex" action="employee-search.php" method="POST">
          <input type="search" id="myInput" class="form-control form-control-sm me-2 remove-focus" name="search" placeholder="Search..." aria-label=".form-control-sm example" required>
          <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>
      </div>
    </div>

  </div>

  <table class="table">
    <br>
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">city</th>
        <th scope="col" colspan="2">Action</th> 
      </tr>
    </thead>
    <tbody id="myTable">

    <?php         
        $q="SELECT * FROM employee";
        $res=mysqli_query($conn,$q);
        if($res && $res->num_rows>0)
        {
          while ($data=$res->fetch_assoc()){
           $eid = $data['eid'];
           $ename = $data['ename'];
           $eemail = $data['eemail'];
           $ecity = $data['ecity'];
            echo "<tr>
            <td>".$eid."</td>
            <td>".$ename."</td>
            <td>".$eemail."</td>
            <td>".$ecity."</td>
            
            <td>
                <a href='edit.php?eid=$eid'>
                  <span> Edit </span>
                </a>
            </td>
            <td>
                <a href='delete.php?eid=$eid'>
                  <button> Delete </button>
                </a>
            </td>
            </tr>";
          }
        }
        else
        {
          echo "No record found";
        }
        ?>
    </table>
  </body>
  </html>