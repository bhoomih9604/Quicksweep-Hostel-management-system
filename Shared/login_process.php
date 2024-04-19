<?php
session_start();
$_SESSION['login_status']=false;

$uname = $_POST['username'];
$upass = $_POST['password'];
$utype = $_POST['usertype'];
if($utype=='hostelite')
{
    $roomno = $_POST['roomno'];
}else{
    $roomno='0';
}
   
   $conn=new mysqli("localhost","root","bhoovi1612","quicksweep");
   if($conn->connect_error)
   {
       echo "Connection failed";
   }
   $query= "select * from users where uname='$uname' and upass='$upass'";


   $result=mysqli_query($conn,$query);



   $row_count=mysqli_num_rows($result);

if($row_count==0)
{
    echo "Invalid credentials";
}
else
{
    $_SESSION['login_status']=true;
    $row=mysqli_fetch_assoc($result);
   
    $_SESSION['uname']=$row['uname'];
    $_SESSION['upass']=$row['upass'];
    $_SESSION['roomno']=$row['room_no'];


    echo" login succesfull";
    if($row['utype']=="hostelite")
    {
       
        
      
        header("location:../Hostelites/yslots.php");
      
    }
    if($row['utype']=="wardern")
    {
        header("location:../Wardern/request.php");
    }
   
}

?>