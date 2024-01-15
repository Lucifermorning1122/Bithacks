<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infoportal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailid = $_POST["emailid"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE emailid = '$emailid' AND password = '$password'";
    $result = $conn->query($sql);
    $who="s";
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $rollnumber = $row['rollnumber'];
        header("Location: home.html?who=$who&rollnumber=$rollnumber"); 
        exit;
    } else {
        echo '<script>alert("Incorrect email-ID/password");
        window.history.back();
        </script>';
    }
}

$conn->close();
?>