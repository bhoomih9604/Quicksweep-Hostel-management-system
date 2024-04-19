<?php
$mysqli = new mysqli('localhost', 'root', 'bhoovi1612', 'quicksweep');
session_start();
if(isset($_SESSION['uname']))
{
    $name=$_SESSION['uname'];
    $roomno=$_SESSION['roomno'];
    
}
if(isset($_GET['date']))
{
    $date=$_GET['date'];
$stmt = $mysqli->prepare("select * from bookings where date=?");
$stmt->bind_param('s',$date);
$bookings = array();
if($stmt->execute()){
$result = $stmt->get_result();
if($result->num_rows>0){
while($row = $result->fetch_assoc()){
$bookings = $row['timeslot'];
}

$stmt->close();
}
}
}

 $query="select * from bookings where value=1";
 $result= mysqli_query($mysqli,$query);  
 $t=array();
 while($row=mysqli_fetch_assoc($result))
 {
$t[]=$row['timeslot'];
    
 }

//print_r($t);



if(isset($_POST['submit'])){
   
    $timeslot = $_POST['timeslot'];
    $remarks=$_POST['remarks'];
    //$val=$_POST['1'];
    
    $stmt = $mysqli->prepare("select * from bookings where date=? AND room_no = ?");
    $stmt->bind_param('ss',$date,$roomno);
  
    if($stmt->execute()){
    $result = $stmt->get_result();
    
    if($result->num_rows>0){
        $msg = "<div class='alert alert-danger'>Room can't be booked for $date</div>";
    }
    else{
        $stmt = $mysqli->prepare("INSERT INTO bookings (name, room_no, date,timeslot,Remarks) VALUES (?,?,?,?,?)");
        $stmt->bind_param('sssss', $name, $roomno, $date,$timeslot,$remarks);
        $stmt->execute();
         
        $stmt = $mysqli->prepare("INSERT INTO booked (uname, roomno, date,timeslot) VALUES (?,?,?,?)");
        $stmt->bind_param('ssss', $name, $roomno, $date,$timeslot);
        $stmt->execute();

        $msg = "<div class='alert alert-success'>Booking Successful!</div>";
        //$bookings[]=$timeslot;
        $stmt->close();
        $mysqli->close();
    

    }
    
 
    }
    }

   
    

    $duration=15;
    $cleanup=0;
    $start="9.00";
    $end="19.00";
    function timeslots($duration,$cleanup,$start,$end){
        $start = new DateTime($start);
        $end = new DateTime($end);
        $interval = new DateInterval("PT".$duration."M");
        $cleanupInterval = new DateInterval("PT".$cleanup."M");
        $slots = array();
        for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
        break;
        }
        $slots[] = $intStart->format("H:iA")."-".$endPeriod->format("H:iA");
        }
        return $slots;
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
</head>
<body>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div>
<a href="booking.php">
                <button class="btn btn-warning">Back to Homepage!</button>
            </a>
</div>
   
<div class="container">
<h1 class="text-center">Book for date: <?php echo date('d/m/Y',strtotime($date)); ?></h1>
<div class="row">

<div class="col-md-12">
    <?php echo isset($msg)?$msg:"";?>
</div>
<?php
$timeslots = timeslots($duration, $cleanup, $start, $end);
$tarray=array();
 for($i=0;$i<count($timeslots);$i++)
 {
   $tarray[$i]=$timeslots[$i];
   
 }
//print_r($tarray);


$d=date('d/m/Y',strtotime($date));
//echo($d);

$diff=array_diff($tarray,$t);
//print_r($diff);
date_default_timezone_set('Asia/Kolkata');

$dcurrent=date("d/m/Y");
//echo($dcurrent);
$tcurrent=date("H:iA");
//echo($tcurrent);
?>
<?php 
foreach($diff as $ts)
{  if($d==$dcurrent){

   ?>
   <?php if($ts>$tcurrent){
    
    ?>
<div class="col-md-2">
    <button class="btn btn-success book" data-timeslot="<?php echo $ts;?>"><?php echo $ts; ?>  </button>
</div>
<?php }else{?>
    <div class="col-md-2">
    <button class="btn btn-secondary" ><?php echo $ts; ?>N/A  </button>
</div>
<?php }?>
<?php }else{?>
    <div class="col-md-2">
    <button class="btn btn-success book" data-timeslot="<?php echo $ts;?>"><?php echo $ts; ?>  </button>
</div>
    <?php } ?>
<?php }?>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Booking: <span id="slot"></span></h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Timeslot</label>
                    <input type="text" readonly name="timeslot" id="timeslot" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Remarks</label>
                    <input type="text" name="remarks" class="form-control">
                </div>
                <div class="form-group pull-right">
                    <button class="btn btn-primary" type="submit" name= "submit">Submit</button>
                </div>

            </form>
        </div>
      </div>
      </div>
      
    </div>

  </div>
</div>

<script>
    $(".book").click(function()
    {
var timeslot = $(this).attr('data-timeslot');
$("#slot").html(timeslot);
$("#timeslot").val(timeslot);
$("#myModal").modal("show");
})


</script>







</body>

</html>