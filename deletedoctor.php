<?php

session_start();

$conn =
mysqli_connect(
"localhost",
"root",
"",
"MaternCare"
);

$id =
$_GET['id'];

$sql =
"
DELETE FROM doctors
WHERE Doctor_ID='$id'
";

mysqli_query(
$conn,
$sql
);

$_SESSION['message']
=
"Doctor deleted successfully!";

header(
"Location:doctorlist.php"
);

exit();

?>