<?php
session_start();

$conn = mysqli_connect("localhost","root","","materncare");

$doctor_id = $_SESSION['Doctor_ID'];

$search = "";

if(isset($_GET['search']))
{
    $search = trim($_GET['search']);

    $sql = "SELECT * FROM record
            WHERE Doctor_ID='$doctor_id'
            AND Name LIKE '%$search%'";

    $result = mysqli_query($conn,$sql);

    /* EXTRA VALIDATION */
    if(mysqli_num_rows($result) === 0)
    {
        $message = "No patient record found.";
    }
}
else
{
    $sql = "SELECT * FROM record
            WHERE Doctor_ID='$doctor_id'";

    $result = mysqli_query($conn,$sql);
}

/* SECURITY CHECK */
if($doctor_id == "")
{
    die("Unauthorised Access");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Patient Record</title>
<link rel="stylesheet" href="doctorrecord.css">
</head>

<body>

<nav>

<div class="nav-search">
<form method="GET">

<input
type="text"
name="search"
placeholder="Search patient name..."
value="<?php echo htmlspecialchars($search); ?>"
>

<button type="submit">Search</button>

</form>
</div>

<ul>
<li><a href="doctorhome.php">Home</a></li>
<li><a href="doctorrecord.php">Patient Record</a></li>
<li><a href="bookinglist.php">Booking List</a></li>
<li><a href="logout.php" class="logout-btn">Sign Out</a></li>
</ul>

</nav>

<h1>Patient Record</h1>

<?php
if(isset($message))
{
    echo "<p>$message</p>";
}
?>

<div class="table-container">

<table>

<tr>
<th>Record Ref</th>
<th>Booking Ref</th>
<th>Name</th>
<th>Patient Details</th>
<th>Health Assessment</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['Record_REF']; ?></td>

<td><?php echo $row['Booking_REF']; ?></td>

<td><?php echo strtoupper($row['Name']); ?></td>

<td>
<a href="patientdetails.php?record_ref=<?php echo $row['Record_REF']; ?>" class="view-btn">
View
</a>
</td>

<td>
<a href="healthassessment.php?record_ref=<?php echo $row['Record_REF']; ?>" class="assessment-btn">
Assessment
</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>
