
<?php session_start(); ?>

<?php 

$Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Office";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="CSS/UserUpdate.css">
  <style type="text/css">
    
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
      <li><a href="EmployeeAccount.php"><b>&nbsp&nbsp&nbsp&nbsp Home</b></a></li>
      <li><a href="EmployeeUpdate.php"><b>Update Profile</b></a></li>
      <li><a href="LeaveApplication.php"><b>Leave Application</b></a></li>
      <li><a href="LeaveStatus.php"><b>View Leave Status</b></a></li>
      <li  class="active"><a href="RemainDays.php"><b>Remain Days</b></a></li>
    </ul>
  
   <ul class="nav navbar-nav navbar-right">

      <li><a href="EmpLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>

<?php 

 $uname= $_SESSION['uName'];
 $query="select * from Employee where Eusername='$uname'";
$Result=mysqli_query($connection,$query);
 $row = mysqli_fetch_array($Result);


 $day=$row['TotalLeave'];
 echo "<br><br><br><br><br><br>br><br>br>";

 echo "<h1 style='color:white;text-align:center;background-color: #008000'> You Have <b> <span style='color:red'>$day</span></b> Days Leave Remain";

?>

</body>
</html>

