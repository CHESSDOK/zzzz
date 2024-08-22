<?php
session_start();

// Assuming you have a session variable that holds the user type
$user = $_SESSION['usertype'];

if ($user == 'Applicant') {
    include '../nav_user.php';
} elseif ($user == 'Employer') {
    include '../nav_employer.php';
} elseif ($user == 'OFW') {
    include '2.php';
} else {
    // Handle case where user type is unknown or not set
    echo 'User type not recognized';
}
include '../php/conn_db.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link rel="stylesheet" href="../css/nav_float.css">
  <link rel="stylesheet" href="../css/applicant.css">
  <link
      href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
      rel="stylesheet"
    />
</head>
<style>
body::before{
    background-image:none;
    background-color:#EBEEF1;
    }
</style>
<body>

    <!-- Navigation -->

  
    <header>
        <h1 class="h1">Applicant Dashboard</h1>
    </header>
    <div class="container">
        <h1>Job Listings</h1>
        <div class="job-list">
            <?php include '../php/job_list.php'; ?>
        </div>
    </div>

   <script src="../javascript/script.js"></script> <!-- You can link your JavaScript file here if needed -->
</body>
</html>
