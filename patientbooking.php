<?php
session_start();

$conn=mysqli_connect("localhost","root","","MaternCare");

$message="";
$type="";

/* check login */
if(!isset($_SESSION['username']))
{
header("Location:index.php");
exit();
}

$name=$_SESSION['username'];
$IC_Number=$_SESSION['IC_Number'];

/* simpan value supaya tak hilang */
$mobile="";
$date="";
$time="";

if(isset($_POST['submit']))
{

$mobile=trim($_POST['mobile']);
$date=$_POST['appointment_date'];
$time=$_POST['time'];

$status="Pending";

/* masa hanya 8 pagi - 5 petang */
if($time<"08:00" || $time>"17:00")
{
$message="Appointment time only from 8:00 AM until 5:00 PM";
$type="error";
}

elseif($date<=date("Y-m-d"))
{
$message="Appointment date must be after today";
$type="error";
}

else
{

$check=mysqli_query(
$conn,
"SELECT COUNT(*) total
FROM booking
WHERE appointment_date='$date'
AND Time='$time'"
);

$total=mysqli_fetch_assoc($check);

if($total['total']>=1)
{
$message="Selected appointment slot is unavailable. Please change the appointment date or time.";
$type="error";
}

else
{

$sql="INSERT INTO booking
(
Name,
IC_Number,
mobile,
appointment_date,
Time,
Status
)

VALUES
(
'$name',
'$IC_Number',
'$mobile',
'$date',
'$time',
'$status'
)";

if(mysqli_query($conn,$sql))
{

$message="Thank you for making a booking!";
$type="success";

/* clear form selepas berjaya */
$mobile="";
$date="";
$time="";

}
else
{
$message="Booking failed";
$type="error";
}

}

}

}
?>

<!DOCTYPE html>

<html>

<head>

<title>Booking Form</title>

<link rel="stylesheet" href="bookingform.css">

</head>

<body>

<nav>

<div class="logo">
<img src="logo.jfif">
<h1>MaternCare</h1>
</div>

<ul>
<li><a href="patienthome.php">Home</a></li>
<li><a href="bookingpage.php">Booking</a></li>
<li><a href="maternalrecord.php">Maternal Record</a></li>

<li>
<a href="logout.php" class="logout-btn">
Sign Out
</a>
</li>

</ul>

</nav>

<h1 class="title">
Booking Form
</h1>

<div class="form-box">

<form method="POST">

<div class="row">

<label>IC Number</label>

<input
type="text"
value="<?= $IC_Number ?>"
readonly>

</div>

<div class="row">

<label>Mobile Number</label>

<input
type="text"
name="mobile"
value="<?= htmlspecialchars($mobile) ?>"
required>

</div>

<div class="row">

<label>Date of Appointment</label>

<input
type="date"
name="appointment_date"
value="<?= $date ?>"
min="<?= date('Y-m-d',strtotime('+1 day')) ?>"
required>

</div>

<div class="row">

<label>Time</label>

<input
type="time"
name="time"
value="<?= $time ?>"
min="08:00"
max="17:00"
required>

</div>

<div class="buttons">

<button type="submit" name="submit">
Submit
</button>

<button type="reset">
Clear
</button>

</div>

</form>

<p class="<?= $type ?>">
<?= $message ?>
</p>

</div>

</body>

</html>
