<?php
include 'connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$rollnumber = $_GET['rollnumber'];
$eventname = $_GET['event'];
$currentDate = date('Y-m-d');
$sql = "SELECT * FROM events WHERE event_type='$eventname' AND end_date >= '$currentDate' ORDER BY start_date ASC";
$result = $conn->query($sql);
echo 
        "<h3 style='text-align: center;text-transform: uppercase;font-family: Lucida Sans, Lucida Sans Regular, Lucida Grande, Lucida Sans Unicode, Geneva, Verdana, sans-serif;color: white;'>". $eventname ."</h3>
        <div class='event-cards'>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];
        $venue = $row['venue'];
        
        echo 
        "<div class='card'>
          <div class='card-content'>
            <h2>". $name ."</h2>
            <p>Date: ". $start_date ." to ". $end_date ."</p>
            <p>Location: ". $venue ."</p>
            <a href='format.html?event=". $name ."&type=". $eventname ."&rollnumber=".$rollnumber."' class='btn'>Learn More</a>
          </div>
        </div>";
    }
} else {
    echo "<h3>No upcomming events found in ". $eventname ."</h3>";
}
echo"</div>";

$conn->close();
?>
