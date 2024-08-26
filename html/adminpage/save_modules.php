<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_id = $_POST['course_id'];
    $module_count = $_POST['module_count'];

    // Loop through each module and save to the database
    for ($i = 1; $i <= $module_count; $i++) {
        $module_name = $_POST["module_name_$i"];
        
        // Save module details to the database
        saveModuleToDatabase($course_id, $module_name);
    }

    // Redirect or show a success message
    echo "Modules saved successfully!";
}

function saveModuleToDatabase($course_id, $module_name) {
    // Database connection (replace with your actual connection details)
    $conn = new mysqli('localhost', 'root', '', 'peso');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO modules (course_id, module_name) VALUES (?, ?)");
    $stmt->bind_param("is", $course_id, $module_name);

    // Execute the statement
    $stmt->execute();

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
