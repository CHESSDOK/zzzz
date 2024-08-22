<?php
include 'conn_db.php';

// Fetch all employers
$sql = "SELECT * FROM empyers";
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
            <th>First Name</th>
            <th>Last Name</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["Fname"] . "</td>
                        <td>" . $row["Lname"] . "</td>
                        <td><a href='employer_docs_list.php?user_id=" . $row["id"] . "'>View Documents</a></td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No employers found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
