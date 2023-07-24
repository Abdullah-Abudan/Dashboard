<?php
$page_title = "employee-search"; 
  include("./config/constants.php");
  include("./config/check_alogin.php");
?>

<style>
.employee{
    display: none;
    }
</style>

<table class="table">
    <br>
    <thead>
        <tr>
            <th scope="col">eID</th>
            <th scope="col">eName</th>
            <th scope="col">eEmail</th>
            <th scope="col">eCity</th>
        </tr>
    </thead>
    <tbody id="myTable">
    <?php  
    if(isset($_POST['search'])){
        $key_word = $_POST['search'];
        $q = "SELECT * FROM employee WHERE ename LIKE '%$key_word%' OR eemail LIKE '%$key_word%'";
        $res = mysqli_query($conn, $q);
        while ($data = $res->fetch_assoc()) {
            echo 
            "<tr>
            <td>".$data['eid']."</td>
            <td>".$data['ename']."</td>
            <td>".$data['eemail']."</td>
            <td>".$data['ecity']."</td>
            </tr>";
        }
    }
    else
    {
        header("location:dashboard.php");
    }  
    ?>
    </tbody>
</table>