<?php

$conn=mysqli_connect("localhost","root","","MaternCare");

if(isset($_GET['id']))
{
$id=$_GET['id'];

$sql="DELETE FROM record WHERE Record_REF='$id'";

if(mysqli_query($conn,$sql))
{
header("Location: adminrecord.php");
exit();
}
else
{
echo "Delete failed";
}

}

?>