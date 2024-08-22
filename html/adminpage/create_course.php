<?php
include 'conn_db.php';
$course = $_POST['course'];
$description = $_POST['description'];

// SQL query to insert data into the database
$sql = "INSERT INTO courses (course_name, description) VALUES ('$course', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "New course created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();

?>