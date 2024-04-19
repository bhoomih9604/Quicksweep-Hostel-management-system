<?php
include"wmenu.php";
$mysqli = new mysqli('localhost', 'root', 'bhoovi1612', 'quicksweep');
$uname=$_GET['cartid'];
$rn=$_GET['date'];



$stmt = $mysqli->prepare("DELETE  FROM users where uname='{$uname}' and room_no='{$rn}' "); 

$stmt->execute();
header("location:user.php");
 
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