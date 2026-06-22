<?php
session_start();

$conn=mysqli_connect("localhost","root","","MaternCare");

$message="";
$type="";

$hospital_query=mysqli_query($conn,"SELECT Hospital_ID,Name FROM hospital");

if(isset($_POST['submit']))
{
$name=$_SESSION['username'];
$IC_Number=trim($_POST['IC_Number']);
$age=$_POST['age'];
$mobile=trim($_POST['mobile']);
$date=$_POST['appointment_date'];
$time=$_POST['time'];
$hospital_id=$_POST['hospital'];
$status="Pending";

if(!preg_match("/^\d{12}$/",$IC_Number))
{
$message="IC Number must contain 12 digits";
$type="error";
}

elseif($date<=date("Y-m-d"))
{
$message="Appointment date must be after today";
$type="error";
}

else
{
$hospital=mysqli_query(
$conn,
"SELECT Name FROM hospital WHERE Hospital_ID='$hospital_id'"
);

$row=mysqli_fetch_assoc($hospital);

$hospital_name=$row['Name'];

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
$message="Selected appointment slot is full";
$type="error";
}

else
{
$sql="INSERT INTO booking
(Name,IC_Number,age,Time,mobile,appointment_date,Hospital_Name,Status)

VALUES

('$name','$IC_Number','$age','$time','$mobile','$date','$hospital_name','$status')";

if(mysqli_query($conn,$sql))
{
$message="Booking successful";
$type="success";
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
<li><a href="logout.php" class="logout-btn">Sign Out</a></li>
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
name="IC_Number"
placeholder="000000000000"
pattern="[0-9]{12}"
maxlength="12"
required>

</div>

<div class="row">

<label>Age</label>

<input
type="number"
name="age"
required>

</div>

<div class="row">

<label>Mobile Number</label>

<input
type="text"
name="mobile"
required>

</div>

<div class="row">

<label>Preferred Hospital</label>

<select name="hospital" required>

<option value="">
Select Hospital
</option>

<?php while($hospital=mysqli_fetch_assoc($hospital_query)){ ?>

<option value="<?= $hospital['Hospital_ID'] ?>">
<?= $hospital['Name'] ?>
</option>

<?php } ?>

</select>

</div>

<div class="row">

<label>Date of Appointment</label>

<input
type="date"
name="appointment_date"
min="<?= date('Y-m-d',strtotime('+1 day')) ?>"
required>

</div>

<div class="row">

<label>Time</label>

<input
type="time"
name="time"
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
