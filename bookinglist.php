<?php
session_start();

$conn=mysqli_connect("localhost","root","","materncare");

if(!$conn)
{
die("Connection Failed");
}

if(isset($_POST['update']))
{
$booking_ref=$_POST['booking_ref'];
$status=$_POST['status'];
$doctor_id=$_POST['doctor'];

$getDoctor=mysqli_query(
$conn,
"
SELECT *
FROM doctors
WHERE Doctor_ID='$doctor_id'
"
);

$doctor=mysqli_fetch_assoc($getDoctor);
$doctor_name=$doctor['Name'];

mysqli_query(
$conn,
"
UPDATE booking
SET
Status='$status',
Doctor_ID='$doctor_id',
Doctor_Name='$doctor_name'
WHERE Booking_REF='$booking_ref'
"
);

$check=mysqli_query(
$conn,
"
SELECT *
FROM record
WHERE Booking_REF='$booking_ref'
"
);

if(mysqli_num_rows($check)==0)
{
mysqli_query(
$conn,
"
INSERT INTO record
(
CheckupDate,
CheckupTime,
IC_Number,
Name,
Booking_REF,
Doctor_ID
)

SELECT
appointment_date,
Time,
IC_Number,
Name,
Booking_REF,
Doctor_ID

FROM booking

WHERE Booking_REF='$booking_ref'
"
);
}

echo "
<script>
alert('Booking updated successfully!');
window.location='bookinglist.php';
</script>
";

exit();

}

$sql="
SELECT *
FROM booking
ORDER BY
appointment_date DESC,
Time DESC
";

$result=mysqli_query($conn,$sql);

$doctor_query=mysqli_query(
$conn,
"
SELECT *
FROM doctors
ORDER BY Name
"
);

?>

<!DOCTYPE html>

<html>

<head>

<title>Booking List</title>

<link rel='stylesheet' href='bookingliststyle.css'>

</head>

<body>

<nav>

<div class="logo">

<img src="logo.jfif">

<h1>MaternCare</h1>

</div>

<ul>

<li>
<a href="adminhome.php">
Home
</a>
</li>

<li>
<a href="adminreport.php">
Report
</a>
</li>

<li>
<a href="doctorlist.php">
Doctor List
</a>
</li>

<li>
<a href="bookinglist.php">
Booking List
</a>
</li>

<li>
<a href="adminrecord.php">
Record
</a>
</li>

<li>
<a href="logout.php" class="logout-btn">
Sign Out
</a>
</li>

</ul>

</nav>

<h1>
Manage Booking
</h1>

<table border="1">

<tr>

<th>Booking Ref</th>
<th>Name</th>
<th>IC Number</th>
<th>Date</th>
<th>Time</th>
<th>Mobile</th>
<th>Assign Doctor</th>
<th>Status</th>
<th>Update</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)) { ?>

<tr>

<form method="POST">

<td>

<?= $row['Booking_REF']; ?>

<input
type="hidden"
name="booking_ref"
value="<?= $row['Booking_REF']; ?>">

</td>

<td>
<?= $row['Name']; ?>
</td>

<td>
<?= $row['IC_Number']; ?>
</td>

<td>
<?= $row['appointment_date']; ?>
</td>

<td>
<?= $row['Time']; ?>
</td>

<td>
<?= $row['mobile']; ?>
</td>

<td>

<select name="doctor" required>

<option value="">
Select Doctor
</option>

<?php

mysqli_data_seek($doctor_query,0);

while($d=mysqli_fetch_assoc($doctor_query))
{

?>

<option
value="<?= $d['Doctor_ID']; ?>"

<?php
if($row['Doctor_ID']==$d['Doctor_ID'])
echo "selected";
?>

>

<?= $d['Name']; ?>

</option>

<?php } ?>

</select>

</td>

<td>

<select name="status">

<option
value="Pending"

<?php
if($row['Status']=="Pending")
echo "selected";
?>

>

Pending

</option>

<option
value="Approved"

<?php
if($row['Status']=="Approved")
echo "selected";
?>

>

Approved

</option>

<option
value="Rejected"

<?php
if($row['Status']=="Rejected")
echo "selected";
?>

>

Rejected

</option>

</select>

</td>

<td>

<button
class="update-btn"
name="update">

Update

</button>

</td>

</form>

</tr>

<?php } ?>

</table>

</body>

</html>
