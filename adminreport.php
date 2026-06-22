<?php
$conn=mysqli_connect("localhost","root","","materncare");

$sql="SELECT MONTHNAME(appointment_date) AS Month,COUNT(*) AS Total FROM booking GROUP BY MONTH(appointment_date) ORDER BY MONTH(appointment_date)";

$result=mysqli_query($conn,$sql);

$month=[];
$total=[];
$data=[];

while($row=mysqli_fetch_assoc($result))
{
$month[]=$row['Month'];
$total[]=$row['Total'];
$data[]=$row;
}
?>

<!DOCTYPE html>

<html>

<head>

<title>Admin Report</title>

<link rel="stylesheet" href="adminreport.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

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

</nav>

<div class="container">

<h1>Monthly Appointment Report</h1>

<table>

<tr>
<th>Month</th>
<th>Total Appointment</th>
</tr>

<?php foreach($data as $row){ ?>

<tr>

<td><?php echo $row['Month'];?></td>

<td><?php echo $row['Total'];?></td>

</tr>

<?php } ?>

</table>

<div class="chart">

<canvas id="myChart"></canvas>

</div>

</div>

<script>

new Chart(
document.getElementById("myChart"),
{
type:"bar",

data:{
labels:<?php echo json_encode($month);?>,

datasets:[
{
label:"Appointment",
data:<?php echo json_encode($total);?>
}
]
}

}
);

</script>

</body>

</html>