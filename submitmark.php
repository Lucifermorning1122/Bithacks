<?php


include 'connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$rollNumber = $_POST['rollNumber'];
$eventMarks = $_POST['eventMarks'];

$sql = "UPDATE table_name SET column1 = value1, column2 = value2, ... WHERE condition;";

if ($conn->query($sql) === TRUE) {
    echo "Marks submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
