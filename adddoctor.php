<?php

include("connect.php");

$message="";

$get=mysqli_query(
$conn,
"SELECT Doctor_ID
FROM doctors
ORDER BY Doctor_ID DESC
LIMIT 1"
);

if(mysqli_num_rows($get)>0)
{
$row=mysqli_fetch_assoc($get);

$last_id=$row['Doctor_ID'];

$number=(int)substr($last_id,1);

$number++;

$doctor_id="D".str_pad(
$number,
3,
"0",
STR_PAD_LEFT
);
}
else
{
$doctor_id="D001";
}


if(isset($_POST['add']))
{

$name=$_POST['name'];
$specialization=$_POST['specialization'];
$email=$_POST['email'];

$sql="INSERT INTO doctors
(
Doctor_ID,
Name,
Specialization,
Email
)

VALUES
(
'$doctor_id',
'$name',
'$specialization',
'$email'
)";

if(mysqli_query($conn,$sql))
{

$message="Doctor Added Successfully!";

header("Refresh:1");

}
else
{
$message="Failed to Add Doctor!";
}

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Add Doctor</title>

<link rel="stylesheet"
href="adddoctorstyle.css">

</head>

<body>

<nav>

<div class="logo">
<img src="logo.jfif">
<h1>MaternCare</h1>
</div>

<ul>
<li><a href="adminhome.php">Home</a></li>
<li><a href="adminreport.php">Report</a></li>
<li><a href="doctorlist.php">Doctor List</a></li>
<li><a href="bookinglist.php">Booking List</a></li>
<li><a href="adminrecord.php">Record</a></li>
<li><a href="logout.php"class="logout-btn">Sign Out</a></li>
</ul>

</nav>

<h2>Add Doctor</h2>

<form method="POST">

<div class="form-box">

<?php
if($message!="")
{
?>

<p class="message">
<?= $message ?>
</p>

<?php
}
?>

<div class="row">

<label>Doctor ID</label>

<input type="text" name="doctor_id" value="<?= $doctor_id ?>"readonly>

</div>

<div class="row">

<label>Name</label>

<input type="text" name="name"required>

</div>

<div class="row">

<label>Specialization</label>

<select name="specialization" required>

<option value="">Select</option>

<option>Obstetrician & Gynecologist (OB-GYN)</option>
<option>Maternal-Fetal Medicine Specialist</option>
<option>Family Medicine Specialist</option>
<option>Dietitian / Nutritionist</option>
<option>Anesthesiologist</option>
<option>Midwife</option>
<option>General Practitioner (GP)</option>

</select>

</select>

</div>

<div class="row">

<label>Email</label>

<input type="email" name="email" required>

</div>

<div class="button-area">

<button type="submit"name="add">Add Doctor
</button>

<button type="reset"> Clear</button>

</div>

</div>

</form>

</body>

</html>
