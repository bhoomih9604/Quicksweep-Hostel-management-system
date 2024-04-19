<?php
include"wmenu.php";
$mysqli = new mysqli('localhost', 'root', 'bhoovi1612', 'quicksweep');
$uname=$_GET['cartid'];
$rn=$_GET['date'];
echo($time);


$stmt = $mysqli->prepare("DELETE  FROM complains where name='{$uname}' and roomno='{$rn}' "); 

$stmt->execute();
header("location:wc.php");
 
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