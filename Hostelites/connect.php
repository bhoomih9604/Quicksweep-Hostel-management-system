<?php
$com=$_POST['com'];
$mysqli = new mysqli('localhost', 'root', 'bhoovi1612', 'quicksweep');
include "hmenu.php";

if(isset($_SESSION['uname']))
{
    $name=$_SESSION['uname'];
    $roomno=$_SESSION['roomno'];
    
}
$stmt=$mysqli->prepare("insert into complains(name,roomno,complain)values(?,?,?)");
$stmt->bind_param ("sis",$name,$roomno,$com);
$stmt->execute();
$stmt->close();
echo("Complaint registered successfully!");
header("Location:complaints.php");
?>