
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <style>

 body {
  
font-family: Agency FB;
}




</style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Leave Management</a>
    </div>
       <ul class="nav navbar-nav">
      <li  class="active"><a href="EmployeeAccount.php"><b>&nbsp&nbsp&nbsp&nbsp Home</b></a></li>
      <li><a href="EmployeeUpdate.php"><b>Update Profile</b></a></li>
      <li><a href="LeaveApplication.php"><b>Leave Application</b></a></li>
      <li><a href="LeaveStatus.php"><b>View Leave Status</b></a></li>
      <li><a href="RemainDays.php"><b>Remain Days</b></a></li>
    </ul>
  
	
   <ul class="nav navbar-nav navbar-right">
 
      <li><a href="UserLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>
  
  <?php
    $DATABASE="localhost";
     $username="root";
     $psrd="";
     $dbname = "Office";
     $connection= mysqli_connect($DATABASE,$username,$psrd,$dbname);
    
    $uname= $_SESSION['uName'];
     $query="select * from Employee where Eusername='$uname'";
      $Result=mysqli_query($connection,$query);
        
        $row = mysqli_fetch_array($Result);

        echo "<div align='center'>";
          echo "<img style='margin:2% auto auto 2%;float:center;border:3px solid black;border-radius:20px;width:250px;height:220px' src='".$row['Ephoto']."'>";
         echo "</div>";
              echo "<div align='center'>";
              echo "<h1 style'margin:2% auto auto 40%;float:right;' >";
              echo $row['Ename'];
              echo "<br>";
              echo $row['Eemail'];
              echo "<br>";
              echo "</div>";
           
         echo"</div>";   

?>

</body>
</html>

