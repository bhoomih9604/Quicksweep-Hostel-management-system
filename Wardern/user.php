<?php
include "wmenu.php";
if(isset($_SESSION['uname']))
{
    $name=$_SESSION['uname'];
    //echo($name);
   // echo($_SESSION['upass']);
   //$roomno=$_SESSION['roomno'];
    
}
$mysqli = new mysqli('localhost', 'root', 'bhoovi1612', 'quicksweep');
$query="select * from users";
$result=mysqli_query($mysqli,$query);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
.gap{
     margin-bottom:10px;
    }
    </style>
</head>
<body>
    
    <div class="gap">

    </div>
<table id="customers">
  <tr>
    <th>Name</th>
    <th>Roomno</th>
    <th>Usertype</th>
    <th>Created Date</th>
   <th >Delete User</th>
  </tr>
  <tr>
  <?php
  while($row=mysqli_fetch_assoc($result))
  {
    $uname=$row['uname'];
    $rn=$row['room_no'];
      $cd=$row['created_date'];
      $type=$row['utype'];
      
      
   if($row['utype']=='wardern')   {
   echo"
   <td> $uname </td>
   <td> $rn</td>
   
      <td> $type </td>
      <td>$cd</td>
    
      <td><a href='delete4.php?cartid=$uname&date=$rn' class='btn btn-outline-danger'>Delete </a>
      </tr>
      <tr></tr>
      <tr></tr>";
  }else{
    echo"
   <td> $uname </td>
   <td> $rn</td>
   
      <td> $type </td>
      <td>$cd</td>
    
      <td><a href='delete4.php?cartid=$uname&date=$rn' class='btn btn-outline-danger'>Delete </a>
      </tr>
      <tr></tr>
      <tr></tr>";
  }
}
  ?>

</table>

</body>
</html>
