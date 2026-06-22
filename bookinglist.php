
<?php
session_start();

$conn = mysqli_connect("localhost","root","","materncare");

if(!$conn)
{
    die("Connection Failed: " . mysqli_connect_error());
}

/* =========================
   APPROVE BOOKING
========================= */
if(isset($_GET['approve']))
{
    $booking_ref = $_GET['approve'];

    mysqli_query($conn,"
    UPDATE booking
    SET Status='Approved'
    WHERE Booking_REF='$booking_ref'
    ");

    header("Location: bookinglist.php");
    exit();
}

/* =========================
   REJECT BOOKING
========================= */
if(isset($_GET['reject']))
{
    $booking_ref = $_GET['reject'];

    mysqli_query($conn,"
    UPDATE booking
    SET Status='Rejected'
    WHERE Booking_REF='$booking_ref'
    ");

    header("Location: bookinglist.php");
    exit();
}

/* =========================
   CREATE RECORD
========================= */
if(isset($_GET['record']))
{
    $booking_ref = $_GET['record'];

    $booking = mysqli_query($conn,"
    SELECT *
    FROM booking
    WHERE Booking_REF='$booking_ref'
    ");

    $data = mysqli_fetch_assoc($booking);

    if($data)
    {
        $doctor_id = $_SESSION['Doctor_ID'];

        $checkup_date = $data['appointment_date'];
        $checkup_time = $data['Time'];
        $ic_number = $data['IC_Number'];
        $hospital_name = $data['Hospital_Name'];
        $name = $data['Name'];

        $check = mysqli_query($conn,"
        SELECT *
        FROM record
        WHERE Booking_REF='$booking_ref'
        ");

        if(mysqli_num_rows($check) == 0)
        {
            mysqli_query($conn,"
            INSERT INTO record
            (
                CheckupDate,
                CheckupTime,
                IC_Number,
                Name,
                Booking_REF,
                Hospital_Name,
                Doctor_ID
            )
            VALUES
            (
                '$checkup_date',
                '$checkup_time',
                '$ic_number',
                '$name',
                '$booking_ref',
                '$hospital_name',
                '$doctor_id'
            )
            ");
        }
    }

    echo "
    <script>
        alert('Patient record created successfully!');
        window.location.href='doctorrecord.php';
    </script>
    ";
    exit();
}

/* =========================
   SHOW BOOKINGS (NO RECORD YET)
========================= */
$sql = "
SELECT *
FROM booking b
WHERE NOT EXISTS
(
    SELECT 1
    FROM record r
    WHERE r.Booking_REF = b.Booking_REF
)
";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Booking List</title>
    <link rel="stylesheet" href="bookingliststyle.css">
</head>

<body>

<nav>

    <div class="logo">
        <img src="logo.jfif" alt="Logo">
        <h1>MaternCare</h1>
    </div>

    <ul>
        <li><a href="doctorhome.php">Home</a></li>
        <li><a href="doctorrecord.php">Patient Record</a></li>
        <li><a href="bookinglist.php">Booking List</a></li>
        <li><a href="logout.php" class="logout-btn">Sign Out</a></li>
    </ul>

</nav>

<h1>Booking Record</h1>

<table>

<tr>
    <th>Booking Ref</th>
    <th>Name</th>
    <th>IC Number</th>
    <th>Time</th>
    <th>Appointment Date</th>
    <th>Mobile</th>
    <th>Hospital</th>
    <th>Status</th>
    <th>Action</th>
    <th>Record</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

    <td><?php echo $row['Booking_REF']; ?></td>
    <td><?php echo $row['Name']; ?></td>
    <td><?php echo $row['IC_Number']; ?></td>
    <td><?php echo $row['Time']; ?></td>
    <td><?php echo $row['appointment_date']; ?></td>
    <td><?php echo $row['mobile']; ?></td>
    <td><?php echo $row['Hospital_Name']; ?></td>
    <td><?php echo $row['Status']; ?></td>

    <td>
        <button class="approve-btn"
        onclick="window.location.href='bookinglist.php?approve=<?php echo $row['Booking_REF']; ?>'">
            Approve
        </button>

        <button class="reject-btn"
        onclick="window.location.href='bookinglist.php?reject=<?php echo $row['Booking_REF']; ?>'">
            Reject
        </button>
    </td>

    <td>
        <?php if($row['Status'] == 'Approved') { ?>
            <button class="record-btn"
            onclick="window.location.href='bookinglist.php?record=<?php echo $row['Booking_REF']; ?>'">
                Update
            </button>
        <?php } ?>
    </td>

</tr>

<?php } ?>

</table>

</body>
</html>
