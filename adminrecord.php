<?php
session_start();

$conn=mysqli_connect("localhost","root","","MaternCare");

if(!isset($_SESSION['hidden_record']))
{
$_SESSION['hidden_record']=[];
}

if(isset($_GET['hide']))
{
$id=$_GET['hide'];

if(!in_array($id,$_SESSION['hidden_record']))
{
$_SESSION['hidden_record'][]=$id;
}

header("Location: adminrecord.php");
exit();
}

$sql="
SELECT *
FROM record
ORDER BY CheckupDate DESC, CheckupTime DESC
";

$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>

<html>

<head>

<title>Patient Record</title>

<link rel="stylesheet" href="adminrecord.css">

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
<li><a href="logout.php" class="logout-btn">Sign Out</a></li>
</ul>

</nav>

<div class="container">

<h1>Patient Records</h1>

<table>

<tr>

<th>Record Ref</th>
<th>Booking Ref</th>
<th>Name</th>
<th>Patient Details</th>
<th>Action</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<?php
if(in_array($row['Record_REF'],$_SESSION['hidden_record']))
{
continue;
}
?>

<tr>

<td><?= $row['Record_REF'] ?></td>

<td><?= $row['Booking_REF'] ?></td>

<td><?= $row['Name'] ?></td>

<td>

<a
class="view"
href="adminview.php?id=<?= $row['Record_REF'] ?>">

View

</a>

</td>

<td>

<a
class="delete"
href="?hide=<?= $row['Record_REF'] ?>"
onclick="return confirm('Remove this record from interface?')">

Delete

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>
