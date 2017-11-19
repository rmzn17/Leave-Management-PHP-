<?php


if(isset($_GET['Accept']))
{

     $name=$_GET['Accept'];


     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Office";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);

       $query1="select * from LeaveRequest where UserName='$name'";
       $Result1=mysqli_query($connection,$query1);
       $row1 = mysqli_fetch_array($Result1);
       $needday=$row1['NoOfDays'];
       echo $needday;


       $query2="select * from Employee where Eusername='$name'";
       $Result2=mysqli_query($connection,$query2);
       $row2 = mysqli_fetch_array($Result2);
       $totday=$row2['TotalLeave'];
       echo $totday;

       $remainDay=$totday-$needday;
      echo $remainDay;

       $query3="Update Employee set TotalLeave='$remainDay' where Eusername='$name'";
       $Result3=mysqli_query($connection,$query3);
    
        $query4="insert into LeaveStatus(UserName,Status,Seen) values('$name','Accepted','No')";

            //$query5="delete from LeaveRequest where UserName='$name'";


             //mysqli_query($connection,$query5);

    mysqli_query($connection,$query4);
    header('Location:LeaveRequest.php');
}
?>