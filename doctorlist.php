<?php

session_start();

$conn = mysqli_connect(
"localhost",
"root",
"",
"MaternCare"
);

$sql = "SELECT * FROM doctors";
$result = mysqli_query(
$conn,
$sql
);

?>

<!DOCTYPE html>

<html>
<head>
<title>Doctor List</title>
<link rel="stylesheet" href="doctorlist.css">
</head>

<body>
<?php

if(isset($_SESSION['message']))
{
echo "
<script>

alert('".$_SESSION['message']."');

</script>

";

unset($_SESSION['message']);
}

?>

<nav>

    <div class="logo">
        <img src="logo.jfif" alt="Logo">
        <h1>MaternCare</h1>
    </div>
    
    <ul>
        <li><a href="adminhome.php">Home</a></li>
        <li><a href="adminreport.php">Report</a></li>
        <li><a href="doctorlist.php">Doctor List</a></li>
        <li><a href="adminrecord.php">Record</a></li>
        <li><a href="logout.php"class="logout-btn">Sign Out</a>
    </li>
    </ul>

</nav>

<div class="container">

<h1>Doctor List</h1>

<table>

<tr>
<th>Doctor ID</th>
<th>Name</th>
<th>Specialization</th>
<th>Email</th>
<th>Action</th>
</tr>

<?php
while(
$row=
mysqli_fetch_assoc(
$result
)
)
{
?>

<tr>

<td><?= $row['Doctor_ID'] ?></td>
<td><?= $row['Name'] ?></td>
<td><?= $row['Specialization'] ?></td>
<td><?= $row['Email'] ?></td>
<td><a class="update" href="updatedoctor.php?id=<?= $row['Doctor_ID'] ?>">
Update
</a>
<a class="delete" href="deletedoctor.php?id=<?= $row['Doctor_ID'] ?>" onclick="return confirm('Delete this doctor?')">
Delete
</a>

</td>

</tr>

<?php
}
?>

</table>

</div>

</body>

</html>