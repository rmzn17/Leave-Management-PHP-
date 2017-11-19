
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


<script>
  
function ValidateContactForm()
{

 
    var Name=ContactForm.Name;
    var uname=ContactForm.uname;
    var Pass=ContactForm.Password;
    var Email=ContactForm.Email;
    var dept=ContactForm.Dept;



    if (Name.value=="") 
    {
      window.alert("Enter Your Name");
      Email.focus();
      return false;
    }
  

   if (Pass.value=="") 
    {
      window.alert("Enter Password");
      Pass.focus();
      return false;
    }


    if (Email.value=="") 
    {
      window.alert("Enter Your Email");
      Email.focus();
      return false;
    }

   if (!validateCaseSensitiveEmail(Email.value))
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
   if (dept.value=="") 
    {
      window.alert("Enter Your Department");
      Email.focus();
      return false;
    }
    
    return true;

}
function validateCaseSensitiveEmail(email) 
{ 
 var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
 if (reg.test(email)){
 return true; 
}
 else{
 return false;
 } 
} 

</script>

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Leave Management</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="EmployeeAccount.php"><b>&nbsp&nbsp&nbsp&nbsp Home</b></a></li>
      <li  class="active"><a href="EmployeeUpdate.php"><b>Update Profile</b></a></li>
      <li><a href="LeaveApplication.php"><b>Leave Application</b></a></li>
      <li><a href="LeaveStatus.php"><b>View Leave Status</b></a></li>
      <li><a href="RemainDays.php"><b>Remain Days</b></a></li>
    </ul>
  
   <ul class="nav navbar-nav navbar-right">

      <li><a href="EmpLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>


<?php
    $uName= $_SESSION['uName'];
     $Pass= $_SESSION['Pass'];

    
    
       $query="select * from Employee where Eusername='$uName' and Epassword='$Pass'";
    
    
     
      $Complete=mysqli_query($connection,$query) or die("unable to connect");
         
    
    $Rows=mysqli_fetch_array($Complete);

    $name=$Rows['Ename'];
    $uname=$Rows['Eusername'];
    $email=$Rows['Eemail'];
    $dept=$Rows['Edept'];

?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $uName= $_SESSION['uName'];
  
     
     $name=$_POST['Name'];
     $Password=$_POST['Password'];
     $Email=$_POST['Email'];
     $dept=$_POST['Dept'];

    
    $query="update Employee set Ename='$name',Eusername='$uName',Epassword='$Password',Eemail='$Email',Edept='$dept' where Eusername='$uName'";
    
    
     
      $Complete=mysqli_query($connection,$query) or die(" baal unable to connect");

      echo "<script>alert('Updated Successfully');</script>";
         
}
?>




<div class="container">
    <div class="row">
     <div class="login">
       <div class="login-triangle"></div>
  
  <h2 class="login-header">Update Profile</h2>
  <form class="login-container" method="post" action="" name="ContactForm" onsubmit="return ValidateContactForm();">

     <p><input type="text" name="Name" placeholder="Your Name" value="<?php echo $name;?>"></p>
     <p><input type="text" name="uname" placeholder="Your Name" value="<?php echo $uname;?>" disabled></p>
    <p><input type="password" placeholder="New Password" name="Password"></p>
    <p><input type="Email" name="Email" placeholder="Your Email" value="<?php echo $email;?>"></p>

    <p><input type="text" name="Dept" placeholder="Your Address" value="<?php echo $dept;?>"></p>

    <p><input type="submit" value="Update Now"></p>
  </form>
</div>>
    </div>
</div>


</body>
</html>

