<!DOCTYPE html>
<html lang="en">
<head>
 <title>Election </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <style>

 body {
  
font-family: Agency FB;
}

form { margin: 0px 10px; }

h2 {
  margin-top: 2px;
  margin-bottom: 2px;
}

.container { max-width: 360px; }

.divider {
  text-align: center;
  margin-top: 20px;
  margin-bottom: 5px;
}

.divider hr {
  margin: 7px 0px;
  width: 35%;
}

.left { float: left; }

.right { float: right; }



</style>


<script>

function ValidateRegistrationForm()
{
    var name     =EmployeeForm.Ename;
    var uname     =EmployeeForm.Euname;
    var email    =EmployeeForm.Eemail;
    var pass    =EmployeeForm.EPass;
    var dept     =EmployeeForm.Edept;
    if (name.value == "")
    {
        window.alert("Please Enter Your Full Name.");
        name.focus();
        return false;
    }
    
   if (!/^[a-zA-Z]*$/g.test(name.value)) {
        alert("Invalid characters");
        name.focus();
        return false;
    }

    if (uname.value == "")
    {
        window.alert("Please Enter Your User Name.");
        uname.focus();
        return false;
    }
    
   if (!/^[a-zA-Z]*$/g.test(uname.value)) {
        alert("Invalid characters");
        uname.focus();
        return false;
    }

  if (pass.value == "")
    {
        window.alert("Please enter your Password.");
        pass.focus();
        return false;
    }
   if (pass.value.length <6)
    {
        window.alert("Password Atleast 6 Character Long.");
        phone.focus();
        return false;
    }

    if (!validateCaseSensitiveEmail(email.value))
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }

   if (dept.value == "")
    {
        window.alert("Please enter your Department.");
        dept.focus();
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



<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Office";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);
     if (!$connection) 
     {
    die("Connection failed: " . mysqli_connect_error());

     }




         $ename     =mysql_escape_string($_POST['Ename']);
         $uname     =mysql_escape_string($_POST['Euname']);    
          $pass    =mysql_escape_string($_POST['EPass']); 
         $email    =mysql_escape_string($_POST['Eemail']);
        
         $dept    =mysql_escape_string($_POST['Edept']);



 $query="select * from Employee where Eusername='$uname'";
 $Result=mysqli_query($connection,$query);
 $exist=mysqli_num_rows($Result);


if(!$exist){

         $destination = "EmpPhoto/".$_FILES['Epicture']['name'];
         $filename    = $_FILES['Epicture']['tmp_name'];  

         move_uploaded_file($filename, $destination);
         $leave=30;

         $query="insert into Employee(Ename,Eusername,Epassword,Eemail,Edept,Ephoto,TotalLeave) values('$ename','$uname','$pass','$email','$dept','$destination','$leave')";
         if (mysqli_query($connection, $query))
          {
            echo '<script language="javascript">';
            echo 'alert("Registration successfully")';
            echo '</script>';
            

            }

      else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
          }

     
      }
      else
      {
            echo '<script language="javascript">';
            echo 'alert("User Name Exist")';
            echo '</script>';
      }
    }


?>




  
<br>

  <div class="container">
    <div class="row">
      <div class="panel panel-primary">
        <div class="panel-body">
          <form method="POST" enctype="multipart/form-data" action="#" role="form" name="EmployeeForm" onsubmit="return ValidateRegistrationForm();">
            <div class="form-group">
              <h2><a href="UserLogin.php"> <img src="Image/back.jpg"  width="50px" height="50px"  alt="Bid" /> </a> Registration Form</h2>
            </div>
            <br>
            <div class="form-group">
              <label class="control-label" for="signupName">Employee Name</label>
              <input type="text" name="Ename" maxlength="50" class="form-control">
            </div>

            <div class="form-group">
              <label class="control-label" for="signupName">Employee User Name</label>
              <input type="text" name="Euname" maxlength="50" class="form-control">
            </div>

            <div class="form-group">
              <label class="control-label" for="signupName">Employee Password</label>
              <input type="Password" name="EPass" maxlength="50" class="form-control">
            </div>
          
            <div class="form-group">
              <label class="control-label" for="signupEmail">Employee Email</label>
              <input id="signupEmail" type="email" name="Eemail" maxlength="50" class="form-control">
            </div>

            <div class="form-group">
              <label class="control-label">Employee Department</label>
              <input  type="text" name="Edept" maxlength="50" class="form-control">
            </div>
            
             <div class="form-group">
             <label class="control-label">Upload Your Photo</label>
              <input  type="file" name="Epicture">
            </div>

            

            <div class="form-group">
              <button id="signupSubmit" type="submit" class="btn btn-info btn-block">Registration</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>


</body>
</html>

