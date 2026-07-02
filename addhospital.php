<?php

include("connect.php");

$message = "";

$getLast = mysqli_query($conn,"
SELECT MAX(Hospital_ID) AS last_id
FROM hospital
");

$data = mysqli_fetch_assoc($getLast);

$next_id = $data['last_id'] + 1;
$message = "";

if(isset($_POST['add']))
{
$name = $_POST['name'];
$address = $_POST['address'];
$link = $_POST['link'];
$photo = $_POST['photo'];

$sql = "
INSERT INTO hospital
(Name, Address, Link, Photo)
VALUES
('$name','$address','$link','$photo')
";

if(mysqli_query($conn,$sql))
{
$message = "Hospital Added Successfully!";
}
else
{
$message = "Failed to Add Hospital!";
}
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Add Hospital</title>

<link rel="stylesheet" href="addhospitalstyle.css">

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

<h2>Add Hospital</h2>

<form method="POST">

<div class="form-box">

<p class="message">
<?php echo $message; ?>
</p>

<div class="row">

<label>Hospital ID</label>

<input type="text"
value="<?php echo $next_id; ?>"
readonly>

</div>
<div class="row">

<label>Name</label>

<input type="text"
name="name"
required>

</div>

<div class="row">

<label>Address</label>

<textarea name="address" required></textarea>

</div>

<div class="row">

<label>Website Link</label>

<input type="text"
name="link"
required>

</div>

<div class="row">

<label>Photo</label>

<input type="text"
name="photo"
placeholder="Example: hospital.jpg"
required>

</div>

<div class="button-area">

<button type="submit" name="add">
Add
</button>

<button type="reset">
Clear
</button>

</div>

</div>

</form>

</body>
</html>
