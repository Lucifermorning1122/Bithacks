<?php
include 'connection.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$rollnumber = $_GET['rollnumber'];
$eventname = $_GET['event'];

$sql = "SELECT * FROM users WHERE rollnumber='$rollnumber'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $emailid = $row['emailid'];
        $department = $row['department'];
        $sql2 = "INSERT INTO $eventname (`name`, `rollnumber`, `emailid`, `department`) VALUES ('$name','$rollnumber','$emailid','$department')";
        $result2 = $conn->query($sql2);
        
        echo '<script>alert("successfully registered in '.$eventname.'");
        window.history.back();
        </script>';
        }
}