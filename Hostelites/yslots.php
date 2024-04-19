<?php
include "hmenu.php";

if(isset($_SESSION['uname']))
{
    $name=$_SESSION['uname'];
    //echo($name);
   // echo($_SESSION['upass']);
   $roomno=$_SESSION['roomno'];
    
}

if(isset($_POST["delete"])&& isset($_POST["completed"]))
{
    foreach($_POST["completed"] as $deleteid)
    {
       $del="DELETE FROM booked where timeslot=timeslot";
       mysqli_query($mysqli,$del);
    }
}

$mysqli = new mysqli('localhost', 'root', 'bhoovi1612', 'quicksweep');
$query="select date,timeslot from bookings where room_no=$roomno and value=1";
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
    <script>
        function myFunction() {
  alert("Hello! I am an alert box!");
        }
    </script>
    <div class="gap">

    </div>
<table id="customers">
  <tr>
    <th>Date</th>
    <th>Timeslot</th>
    <th >Completed</th>
  </tr>
  <tr>
  <?php
  while($row=mysqli_fetch_assoc($result))
  {
      $time=$row['timeslot'];
      $date=$row['date'];
      
      
   echo"
      <td> $date </td>
      <td>$time</td>
      <td><a href='delete1.php?cartid=$time&date=$date' class='btn btn-outline-danger'>REMOVE</a>
      </tr>";
  }
  ?>

</table>

</body>
</html>