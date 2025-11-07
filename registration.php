<html>
<head>
    <title></title>
</head>
<body>
    <form method="POST" action="#">
        enter id: <input type="text" name="eid"><br>
        enter name: <input type="text" name="ename"><br>
        enter Department: <input type="text" name="dept"><br> 
        enter salary: <input type="text" name="sal"><br><br>
        <input type="submit" name="submit" value="submit">
    </form>
    </body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mcaphp";
$tbname="registration";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) 
    {
    die("Connection failed: " . mysqli_connect_error());
}
 else 
    {
    echo "<h2 align='center'>Connected successfully</h2>";
}
    $eid = $_POST['eid'];
    $ename = $_POST['ename'];
    $dept = $_POST['dept'];
    $sal = $_POST['sal'];
    $query = "INSERT INTO registration(eid, ename, dept, sal) VALUES ('".$eid."','".$ename."','".$dept."','".$sal."')";
    $res = mysqli_query($conn, $query);

    if ($res)
         {
        echo "<p>Submitted successfully!</p>";
    } else {
        echo "<p>Error</p>";
    }

mysqli_close($conn);
?>

