
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
      <li class="active"><a href="LeaveStatus.php"><b>View Leave Status</b></a></li>
      <li><a href="RemainDays.php"><b>Remain Days</b></a></li>
    </ul>
  
   <ul class="nav navbar-nav navbar-right">

      <li><a href="EmpLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>

<?php


  $uname= $_SESSION['uName'];


 $query="select * from LeaveRequest where UserName='$uname'";
 $Result=mysqli_query($connection,$query);
 $exist=mysqli_num_rows($Result);

if(!$exist)
{
             echo '<script language="javascript">';
            echo 'alert("No Request From You")';
            echo '</script>';
             echo "<h1 style='color:white;text-align:center;background-color:gray'>Your Are Not Request Yet for <b> <span style='color:Green'> Leave</span> </b>";
}
else
{
 $query="select * from LeaveStatus where UserName='$uname'";
 $Result=mysqli_query($connection,$query);
 $exist=mysqli_num_rows($Result);


if(!$exist)
{

            echo '<script language="javascript">';
            echo 'alert("Your Application is in Processing")';
            echo '</script>';
             echo "<h1 style='color:white;text-align:center;background-color:gray'>Your Application is in <b> <span style='color:Green'>Processing</span> </b> Now";

}
else
{
          $row = mysqli_fetch_array($Result);

          if($row['Status']=="Accepted")
          {
            echo '<script language="javascript">';
            echo 'alert("Congratulation, Your Application is Accepted")';
            echo '</script>';

            echo "<h1 style='color:white;text-align:center;background-color:gray'>Congratulation $uname, Your Application is <b> <span style='color:Green'>Accepted</span></b> By Admin";

          }
          else
          {
            echo '<script language="javascript">';
            echo 'alert("Sorry, Your Application is Rejected")';
            echo '</script>';
            echo "<h1 style='color:white;text-align:center;background-color:gray'>Sorry $uname, Your Application is <b> <span style='color:Green'>Rejected</span></b> By Admin";
          }


         $query5="delete from LeaveRequest where UserName='$uname'";
          mysqli_query($connection,$query5);


         $query6="delete from LeaveStatus where UserName='$uname'";
          mysqli_query($connection,$query6);

}
}


?>


</body>
</html>

