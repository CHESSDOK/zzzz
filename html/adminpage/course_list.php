<?php
include 'conn_db.php';
session_start();
$admin = $_SESSION['username'];
// Fetch all employers
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Employer List</title>
</head>
<body>
    <h1>Employer List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>course</th>
            <th>desc</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["course_name"] . "</td>
                        <td>" . $row["description"] . "</td>
                        <td><a href='upload_modules.php?user_id=" . $row["id"] . "'>uploadules</a></td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No employers found</td></tr>";
        }
        $conn->close();
        ?>
    </table>

    <a href="course.html?username=<?php echo $admin; ?>">courses</a>
</body>
</html>
