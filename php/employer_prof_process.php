<?php
include 'conn_db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company = $_POST['company'];

    $sql = "UPDATE `employer_profile` SET company_name='$company'";

    if ($conn->query($sql) === TRUE) {
        header ("Location: ../html/job_creat.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
