
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


body {
    background: white;
}

*[role="form"] {
    max-width: 530px;
    padding: 15px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 0.3em;
}

*[role="form"] h2 {
    margin-left: 5em;
    margin-bottom: 1em;
}


  </style>

<script type="text/javascript">
  
  function RequestCheck()
  {
    var cause=RequestForm.leavecause;
    var type=RequestForm.type;
    var days=RequestForm.days;
    var stade=RequestForm.sdate;
    var edate=RequestForm.edate;


     if(trimfield(cause.value) == '') 
    {
       window.alert("Please Enter Causes Of Request.");
        cause.focus();
        return false;
    }

    if(days.value<=0||days.value=="")
    {
       window.alert("Enter Valid days.");
        days.focus();
        return false;
    }

     if(sdate.value=="")
    {
       window.alert("Enter Start Date of Leave.");
        sdate.focus();
        return false;
    }
    if(edate.value=="")
    {
       window.alert("Enter End Date of Leave.");
        edate.focus();
        return false;
    }
  }

function trimfield(str) 
{ 
    return str.replace(/^\s+|\s+$/g,''); 
}


</script>

</head>
<body>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $uname= $_SESSION['uName'];


$cause=$_POST['leavecause'];
$Type=$_POST['type'];
$Days=$_POST['days'];
$sdate=$_POST['sdate'];
$edate=$_POST['edate'];

 $query="select * from LeaveRequest where UserName='$uname'";
 $Result=mysqli_query($connection,$query);
 $exist=mysqli_num_rows($Result);


if(!$exist){

 $query="select * from Employee where Eusername='$uname'";
$Result=mysqli_query($connection,$query);
 $row = mysqli_fetch_array($Result);


 $day=$row['TotalLeave'];


if($day>=$Days){

 $query="select * from Employee where Eusername='$uname'";
$Result=mysqli_query($connection,$query);
 $row = mysqli_fetch_array($Result);


 $dept=$row['Edept'];


$query="insert into LeaveRequest(UserName,Department,LeaveCause,LeaveType,NoOfDays,StartDate,EndDate) values('$uname','$dept','$cause','$Type','$Days','$sdate','$edate')";
         if (mysqli_query($connection, $query))
          {
            echo '<script language="javascript">';
            echo 'alert("Applied Successfully")';
            echo '</script>';
            

            }

      else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
          }

     
      }
      else
      {
             echo '<script language="javascript">';
            echo "alert('Sorry You Have Only '+$day+'  Leave Days Left')";
            
            echo '</script>';


      }
    }
    else
    {
      echo '<script language="javascript">';
            echo 'alert(" Sorry You Have Pending Request")';
            echo '</script>';
    }
  }

?>





<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Leave Management</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="EmployeeAccount.php"><b>&nbsp&nbsp&nbsp&nbsp Home</b></a></li>
      <li><a href="EmployeeUpdate.php"><b>Update Profile</b></a></li>
      <li class="active"><a href="LeaveApplication.php"><b>Leave Application</b></a></li>
      <li><a href="LeaveStatus.php"><b>View Leave Status</b></a></li>
      <li><a href="RemainDays.php"><b>Remain Days</b></a></li>
    </ul>
  
   <ul class="nav navbar-nav navbar-right">

      <li><a href="EmpLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>



<body>
<br>
<div class="container">
            <form class="form-horizontal" method="POST" role="form" name="RequestForm" onsubmit="return RequestCheck();"> 
                <h2>Leave Application Form</h2>
                <div class="form-group">
                    <label for="causes" class="col-sm-3 control-label">Causes Of Leave</label>
                    <div class="col-sm-9">
                        <textarea  rows="4" cols="50" id="leavecause" name="leavecause" placeholder="Enter The Causes Of Leave" class="form-control" autofocus>
                       </textarea>
                      
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Type Of Leave</label>
                    <div class="col-sm-9">
                        <select id="type" name="type" class="form-control">
                            <option>Half Day</option>
                            <option>Full Day</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">No. Of Days</label>
                    <div class="col-sm-9">
                        <input type="text" id="days" name="days" placeholder="Enter Number Of Days" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="startdate" class="col-sm-3 control-label">Start Date</label>
                    <div class="col-sm-9">
                        <input type="date" id="startdate" name="sdate" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label">End Date</label>
                    <div class="col-sm-9">
                        <input type="date" id="enddate" name="edate" class="form-control">
                    </div>
                </div>

                
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block">Leave Request</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->
</body>

</body>
</html>

