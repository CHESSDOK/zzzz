<!DOCTYPE html>
<html lang="en">
<?php
session_start();

// Assuming you have a session variable that holds the user type
$user = $_SESSION['usertype'];

if ($user == 'Applicant') {
    include 'nav_user.php';
} elseif ($user == 'learner') {
    include 'nav_learn.php';
} elseif ($user == 'OFW') {
    header ("");
} else {
    // Handle case where user type is unknown or not set
    echo 'User type not recognized';
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <div class="content">
            <p> <span class="label1">PESO</span><span class="label2">Los Baños</span><br />
            <span class="label3">Public Employment Service Office</span><br>
            <span class="label4"> JOB PORTAL &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span><br>
            <span class="label5">YOUR <span style="color: #3D93D3; font-weight: bold">NEW CAREER </span> STARTS HERE!</span></p>
            <button class="label6">Find Job</button>
            <p><span class="label7"> Available in one roof the various employment promotion, manpower programs, and services of the DOLE </span><br>
                <span class="label8">and other government agencies to enable all types of clientele to know more about them and seek </span> <br>
                <span class="label9"></span>specific assistance they require.</span></p>
        </div>
    </div>

   <script src="javascript/script.js"></script> <!-- You can link your JavaScript file here if needed -->
</body>
</html>
