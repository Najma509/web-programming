<!DOCTYPE html>
<html>
<head>
    <title>Employee</title>
</head>
<body>
    <form method="POST" action="">
        Enter ID: <input type="text" name="eid"><br><br>
        Enter Name: <input type="text" name="ename"><br><br>
        Enter Dept: <input type="text" name="dept"><br><br>
        Enter Salary: <input type="text" name="sal"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "retrieve";

// Connect to database
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "<h2 align='center'>Connected...</h2>";

// Insert data if form submitted
if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['eid']);
    $name = mysqli_real_escape_string($conn, $_POST['ename']);
    $dep = mysqli_real_escape_string($conn, $_POST['dept']);
    $salary = mysqli_real_escape_string($conn, $_POST['sal']);

    $query = "INSERT INTO employee (eid, ename, dept, sal)
              VALUES ('$id', '$name', '$dep', '$salary')";
    $res = mysqli_query($conn, $query);

    if ($res) {
        echo "<p>Submitted successfully!</p>";
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }
}

// Display employee details
echo "<h2 align='center'>Employee Details</h2>";

$sql = "SELECT * FROM employee";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
    echo "<table border='2' align='center'>";
    echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Department</th><th>Salary</th></tr>";
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>
                <td>{$row['eid']}</td>
                <td>{$row['ename']}</td>
                <td>{$row['dept']}</td>
                <td>{$row['sal']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p align='center'>No results found</p>";
}

mysqli_close($conn);
?>
</body>
</html>
