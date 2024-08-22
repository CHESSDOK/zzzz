 <!-- Navigation -->
 <?php
session_start();
// Assuming $conn is your valid database connection
include 'php/conn_db.php'; // Include your database connection script

$userId = $_SESSION['id'];
$sql = "SELECT * FROM empyers WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Invalid query: " . $conn->error);
}

$row = $result->fetch_assoc();
if (!$row) {
    die("User not found.");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link rel="stylesheet" href="css/style.css">
    <style>
        a.disabled {
        color: #d3d3d3;
        pointer-events: none;
        cursor: default;
        }
    </style>
</head>
<body>
 <nav>
        <div class="logo">
            <img src="../img/logo_peso.png" alt="Logo">
            <a href="#"> PESO-lb.ph</a>
        </div>
        <label class="burger" for="burger">
            <input type="checkbox" id="burger">
            <span></span>
            <span></span>
            <span></span>
        </label>
        <ul class="menu">
            <li><a href="#" class="active">Home</a></li>
            <li><a href="html/employer_docs.html">documents</a></li>
            <li><a href="html/about.html">About Us</a></li>
            <li><a href="html/job_creat.php">Employer</a></li>
            <li><a href="html/applicant_list.php">Services</a></li>
            <li><a href="html/contact.html">Contact</a></li>
        </ul>
        <div class="auth">
        <button id ="emprof">  <?php echo htmlspecialchars($_SESSION['username']); ?> </button>
        </div>
    </nav>

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

    <script>
            document.getElementById("emprof").addEventListener("click", function (event) {
        event.preventDefault(); // Prevent default link behavior

        // Change the URL after the transition ends
        setTimeout(function () {
            window.location.href = "html/employer_profile.html";
        }, 300); // Adjust the delay according to your transition duration

        // Adding the class to initiate the fade-in and slide-up animation
        document.body.classList.add('fade-in');
    });
     </script> 
</body>
</html>