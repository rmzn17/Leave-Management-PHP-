

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
  <title>Election </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <style>

 body {
  
font-family: Agency FB;
 
}

    table {
      margin: auto;
      font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
      font-size: 12px;
    }

    h1 {
      margin: 25px auto 0;
      text-align: center;
      text-transform: uppercase;
      font-size: 17px;
    }

    table td {
      transition: all .5s;
    }
    
    /* Table */
    .data-table {
      border-collapse: collapse;
      font-size: 14px;
      min-width: 537px;
    }

    .data-table th, 
    .data-table td {
      border: 1px solid #e1edff;
      padding: 7px 17px;
    }
    .data-table caption {
      margin: 7px;
    }

    /* Table Header */
    .data-table thead th {
      background-color: #508abb;
      color: #FFFFFF;
      border-color: #6ea1cc !important;
      text-transform: uppercase;
    }

    /* Table Body */
    .data-table tbody td {
      color: #353535;
    }
    .data-table tbody td:first-child,
    .data-table tbody td:nth-child(4),
    .data-table tbody td:last-child {
      text-align: right;
    }

    .data-table tbody tr:nth-child(odd) td {
      background-color: #f4fbff;
    }
    .data-table tbody tr:hover td {
      background-color: lightgray;
      border-color: #ffff0f;
    }

    /* Table Footer */
    .data-table tfoot th {
      background-color: #e5f5ff;
      text-align: right;
    }
    .data-table tfoot th:first-child {
      text-align: left;
    }
    .data-table tbody td:empty
    {
      background-color: #ffcccc;
    }


</style>

<script type="text/javascript">

function Accept(name)
{
  if(confirm('Sure To Accept?'))
  {
   
    window.location='Accept.php?Accept='+name
  }
}

function Reject(name)
{
  if(confirm('Sure Reject?'))
  {
    

    window.location='Reject.php?Reject='+name
  }
}
</script>

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Election.Com</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="AdminWork.php"><b>&nbsp&nbsp&nbsp&nbsp Home</b></a></li>
      <li  class="active"><a href="LeaveRequest.php"><b>Leave Request</b></a></li>
      <li><a href="AllEmpRemainDays.php"><b>All Employee Remain Days</b></a></li>
    </ul>
	
   <ul class="nav navbar-nav navbar-right">
 
      <li><a href="EmpLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>

<form action="" method="POST">
<table class="data-table">
 <thead>
     <tr>
       <th>Name</th>
       <th>Department</th>
       <th>Leave Cause</th>
       <th>Leave Type</th>
       <th>No.Of Days</th>
       <th>Start Date</th>
       <th>End Date</th>
       <th>Accept</th>
       <th>Reject</th>

    </tr>
  </thead>

<tbody>

<?php


    $query="select * from Leaverequest";
    $Result=mysqli_query($connection,$query);
   while ($row=mysqli_fetch_array($Result))
    {
         echo "<tr>";
          echo "<td>";
         echo $row['UserName'];
           echo "</td>";
           echo "<td>";
          echo $row['Department'];
           echo "</td>";
          echo "<td>";
         echo $row['LeaveCause'];
         echo "</td>";
          echo "<td>";
          echo $row['LeaveType'];
           echo "</td>";
          echo "<td>";
          echo $row['NoOfDays'];
           echo "</td>";
           echo "<td>";
          echo $row['StartDate'];
           echo "</td>";
           echo "<td>";
          echo $row['EndDate'];
           echo "</td>";


            echo "<td>";
            $name=$row[0];
         
            echo"<a href=javascript:Accept('$name')> <img src='Image/Accepted.jpg'  width='50px' height='50px'/> </a>";
            echo "</td>";

            echo "<td>";
            $name=$row[0];
         
            echo"<a href=javascript:Reject('$name')> <img src='Image/Reject.png'  width='50px' height='50px'/> </a>";
            echo "</td>";
            echo "</tr>";
}
    ?>
</tbody>
</table>
</form>

</body>
</html>

