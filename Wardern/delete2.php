<?php
include"wmenu.php";
$mysqli = new mysqli('localhost', 'root', 'bhoovi1612', 'quicksweep');
$time=$_GET['cartid'];
$date=$_GET['date'];
echo($time);


$stmt = $mysqli->prepare("DELETE  FROM bookings where date='{$date}' and timeslot='{$time}' AND value='{0}'"); 

$stmt->execute();
header("location:request.php");
 
/*if($status)
{
    echo "Item removed from Cart successfully!!";
    header("location:yslots.php");
}
else
{
    echo "Error in removing the cart Item!";
    echo mysqli_error($mysqli);
}*/


?>