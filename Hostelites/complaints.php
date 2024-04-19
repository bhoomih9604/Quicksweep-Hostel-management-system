<?php 
$mysqli = new mysqli('localhost', 'root', 'bhoovi1612', 'quicksweep');
include "hmenu.php"; 

if(isset($_SESSION['uname']))
{
    $name=$_SESSION['uname'];
    //echo($name);
   // echo($_SESSION['upass']);
   $roomno=$_SESSION['roomno'];
    
}

if(isset($_POST['submit']))
{
    $com=$_POST['com'];
    echo($com);
    $stmt=$mysqli->prepare("insert into complains(name,roomno,complain)values(?,?,?)");
$stmt->bind_param ("sis",$name,$roomno,$com);
$stmt->execute();
$stmt->close();
    if($query)
    {
        echo("<div class='alert alert-success'>Booking Successful!</div>");
    }
    else{
        echo("wrg");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <style>
    .NAN{
        width:75%;
        background: beige;color:black;
        height:110px;
    }
    input[type=text] {
  width: 100%;
  height:25px;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
    }
    .flex-bhoomi {
  display: flex;
  flex-direction: column;
}
.border
{
    border:5px black;
}
.gap1
{
    height:10px;
}
   </style>
</head>
<body>
<script>
    function myFunction() {
  alert("Complaint registered successfully!");
}
</script>
<div class="gap1">

</div>


<div class="container NAN flex-bhoomi" >
<div>
    
    
</div>
<div>
    <form action="connect.php" method="POST">
<label for="com">Write your complaint here!</label> <br>
    <input type="text" name="com" id="com">
</div>
<div>
    <button type="submit" name="submit "class="btn btn-success" onclick="myFunction()"> Submit</button>
</div>
</form>
</div>
</body>
</html>