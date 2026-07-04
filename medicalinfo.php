<?php

session_start();
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Medical Information</title>
    <link rel="stylesheet" href="medicalinfo.css">
</head>
<body>

    <nav>

    <div class="logo">
        <img src="logo.jfif" alt="Logo">
        <h1>MaternCare</h1>
    </div>

    <ul>
        <li><a href="patienthome.php">Home</a></li>
        <li><a href="bookingpage.php">Booking</a></li>
        <li><a href="patientrecord.php">Maternal Record</a></li>
        <li><a href="logout.php" class="logout-btn">Sign Out</a></li>
    </ul>

</nav>


<div class="container">

    <h1>Medical Information</h1>

    <div class="card-container">

        <!-- C-Section -->
        <div class="card">
            <h2>C-Section</h2>
            <p>
                A guide to C-Section recovery and essential health self-care tips.
            </p>
            <a href="https://hellodoktor.com/kehamilan/kelahiran-bayi/beranak/pembedahan-caesarean/" target="_blank">
    <button>Read More</button>
</a>
        </div>

        <!-- Self Care -->
        <div class="card">
            <h2>Self Care</h2>
            <p>
                Small acts of self-care can make a big difference during pregnancy.
            </p>
            <a href="https://www.hopkinsmedicine.org/health/conditions-and-diseases/staying-healthy-during-pregnancy" target="_blank">
                <button>Read More</button>
            </a>
        </div>

        <!-- Medication Safety -->
        <div class="card">
            <h2>Medication Safety</h2>
            <p>
                Patients should always follow healthcare professionals'
                instructions when taking medications and be aware of possible
                side effects and drug interactions.
            </p>
            <a href="https://share.google/T35ir36G8MzWqNuai"></a>
    <button>Read More</button>
        </div>

        <!-- Breastfeeding Support -->
        <div class="card">
            <h2>Breastfeeding Support</h2>
            <p>
                Breastfeeding provides essential nutrients and antibodies that
                support a baby's growth, development, and immune system.
            </p>

            <a href="https://www.who.int/health-topics/breastfeeding#tab=tab_1">    <button>Read More</button>
                </a>
            </div>

        <div class="card">
            <h2>Nutrition</h2>
            <p>
                Proper nutrition during pregnancy is important for the health of both mother and baby. 
                Pregnant women should consume a balanced diet that includes fruits, vegetables, whole grains, protein, and dairy products
            </p>

            <a href="https://www.hopkinsmedicine.org/health/wellness-and-prevention/nutrition-during-pregnancy">    <button>Read More</button>
                </a>
                 </div>

        <div class="card">
            <h2>Pregnancy Dressing Tips</h2>
            <p>
                Comfortable and appropriate clothing can help pregnant women feel more confident and relaxed throughout pregnancy.
                Choose loose-fitting, breathable fabrics, supportive maternity wear, and comfortable footwear.
            </p>

            <a href="https://www.anmum.com/content/anmum-v2/content/ph/en/pregnancy/lifestyle/what-to-wear-for-each-trimester.html">    <button>Read More</button>
                </a>
            </div>


        </div>

    </div>

</div>

</body>
</html>
