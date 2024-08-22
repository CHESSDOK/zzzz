<?php
include 'conn_db.php'; // Update the path if needed
session_start();

$user = $_SESSION['id']; // Assume you store the user_id in session after login

$sql = "SELECT user_id FROM employer_profile WHERE user_id = '$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employer_id = $row['user_id'];

    // Ensure the uploads directory exists
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $document_name = $_POST['document_name'];
    $document_path = $targetDir . basename($_FILES["document"]["name"]);

    if (move_uploaded_file($_FILES["document"]["tmp_name"], $document_path)) {
        $sql = "INSERT INTO employer_documents (user_id, document_name, document_path) VALUES ('$employer_id', '$document_name', '$document_path')";

        if ($conn->query($sql) === TRUE) {
            echo "Document uploaded successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "Employer profile not found.";
}

$conn->close();
?>
