<?php
include 'conn_db.php';
session_start();
$admin = $_SESSION['username'];
// Fetch all employers
$module_id = $_GET['module_id'];
$sql = "SELECT * FROM modules WHERE course_id = $module_id ";
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
            <th>name</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["module_name"] . "</td>
                        <td><a href='uploadfile.php?modules_id=" . $row["id"] . "'>uploadules</a></td>
                        <td><a href='quizes.php?modules_id=" . $row["id"] . "'>quiz list</a></td>
                        <td><a href='module_content.php?modules_id=" . $row["id"] . "'>content list</a></td>
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
