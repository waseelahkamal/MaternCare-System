<?php

$conn = mysqli_connect("localhost","root","","MaternCare");

if(isset($_GET['Booking_REF']))
{
    $Booking_REF = $_GET['Booking_REF'];

    $sql = "DELETE FROM booking
            WHERE Booking_REF='$Booking_REF'";

    $result = mysqli_query($conn,$sql);

    if($result)
    {
        header("Location: adminrecord.php");
    }
    else
    {
        echo "Delete failed";
    }
}

?>