<?php
include 'connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $eventname = $_POST["eventname"];
    $eventtype = $_POST["eventtype"];
    $sdate = $_POST["sdate"];
    $edate = $_POST["edate"];
    $stime =$_POST["stime"];
    $etime = $_POST["etime"];
    $venue = $_POST["venue"];
    $description = $_POST["description"];
    $eligibility = $_POST["eligibility"];
    $filename = $_POST["filename"];
    
    $checkExisting = "SELECT * FROM `events` WHERE `name` = '$eventname'";
    $existingResult = $conn->query($checkExisting);
    
    if ($existingResult->num_rows == 0) {
        $sql = "INSERT INTO `events` (`name`, `event_type`, `start_date`, `end_date`, `start_time`, `end_time`, `venue`, `description`, `eligibility`, `filename`, `faculty`) VALUES ('$eventname', '$eventtype', '$sdate', '$edate', '$stime', '$etime', '$venue', '$description', '$eligibility', '$filename', '$id')";

        $sql2 = "CREATE TABLE $eventname (
            s_no INT(255) AUTO_INCREMENT PRIMARY KEY,
            name TEXT(255),
            rollnumber VARCHAR(255),
            emailid VARCHAR(255),
            department TEXT(255),
            mark int(255)
        )";
        $result = $conn->query($sql);
        $result2 = $conn->query($sql2);
        header("Location: event.html");
    } else {

         echo '<script>alert("An event with the same name already exists.");
         window.history.back();
         </script>';
    }

    $conn->close();
}
?>