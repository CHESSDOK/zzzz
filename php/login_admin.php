<?php
include 'conn_db.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_profile WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $id;
            header("Location: ../html/adminpage/employer_list.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with this username.";
    }
}

$conn->close();
?>
