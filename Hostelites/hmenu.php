<?php
$mysqli = new mysqli('localhost', 'root', 'bhoovi1612', 'quicksweep');
session_start();
if(isset($_SESSION['uname']))
{
    $name=$_SESSION['uname'];
    //echo($name);
   // echo($_SESSION['upass']);
   // echo($_SESSION['roomno']);
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
    .gap{
     margin-bottom:20px;
    }
    .flex-container {
  display: flex;
  justify-content: center;
  background-color: white;
  
}
.bb{
    border:2px solid MediumSeaGreen;
}

.flex-container > div {
  background-color:white;
  width: 100px;
  margin: 10px;
  text-align: center;
  line-height: 50px;
  font-size: 20px;
}
    
</style>
</head>
<body>
<div class="flex-container">
  <div class="bb" ><?php echo($name);?></div>
  <div class="bb">Room no:<?php echo($_SESSION['roomno']);?></div>
 
</div>
    <div class="d-flex justify-content-end gap-4 w-100 bg-danger gap">
      <div >

      </div>
    </div>

    <div class="d-flex justify-content-end gap-4 w-100 bg-danger">
        <div>
            <a href="booking.php">
                <button class="btn btn-warning">Book slots</button>
            </a>
        </div>

        <div>
            <a href="yslots.php">
                <button class="btn btn-warning">Your slots</button>
            </a>
        </div>

        <div>
            <a href="complaints.php">
                <button class="btn btn-warning">Complaints</button>
            </a>
        </div>

        <div class="ml-auto">
            <a href="../shared/logout.php">
                <button class="btn btn-success">Logout</button>
            </a>
        </div>
    </div>

</body>
</html>

