<?php

$uname = $_POST['username'];
$upass = $_POST['password'];
$utype = $_POST['usertype'];
if($utype=='hostelite')
{
    $roomno = $_POST['roomno'];
}else{$roomno='0';}


$conn=new mysqli('localhost','root','bhoovi1612','quicksweep');
   if($conn->connect_error)
   {
       echo "Connection failed";
   }
   else{
    //echo($roomno);
    
    $stmt= $conn->prepare("insert into users(uname,upass,utype,room_no) values(?,?,?,?)");
    $stmt->bind_param("ssss",$uname,$upass,$utype,$roomno);
    $stmt->execute();
    $mysqli = new mysqli('localhost', 'root', 'bhoovi1612', 'quicksweep');
    $query="select * from users where room_no=$roomno";
    $result=mysqli_query($mysqli,$query);
    $row=mysqli_fetch_assoc($result);
    $rvalue=$row['rn'];
    //echo($rvalue);
    if($rvalue==1){
        $rvalue=$rvalue+1;
        $stmt = $mysqli->prepare("UPDATE users set rn='{$rvalue}' where room_no='{$roomno}'"); $stmt->execute();
    echo "Registration successful...!";
    }
    elseif($rvalue==2)
    {
        $rvalue=$rvalue+1;
        $stmt = $mysqli->prepare("UPDATE users set rn='{$rvalue}' where room_no='{$roomno}'"); $stmt->execute();
        echo "Registration successful...!";
    }
    elseif($rvalue==3)
    {
        $rvalue=$rvalue+1;
        $stmt = $mysqli->prepare("UPDATE users set rn='{$rvalue}' where room_no='{$roomno}'"); $stmt->execute();
        echo "Registration successful...!";
    }
    elseif($rvalue==4)
    {
        $stmt = $mysqli->prepare("DELETE  FROM users where uname='{$uname}' and room_no='{$roomno}' "); 
        $stmt->execute();
        echo"<div class='alert alert-danger'>Room can't be booked for $roomno</div>";
        echo "Registration unsuccessful...!";
        
        
    }
  
    $stmt->close();
    $conn->close();
   }

?>
