<?php
include 'connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$eventname = $_GET['event'];
$sql = "SELECT * FROM $eventname where mark ='0'";
$result = $conn->query($sql);
echo 
        "<h1 style='font-family:sans-serif;margin: 20px;'>". $eventname ."</h1>
        <div id='cards-container'>";

        $num=1;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $rollnumber = $row['rollnumber'];
        $emailid = $row['emailid'];
        $department = $row['department'];
        echo 
        "<div class='card'>
        <h3>". $name ."</h3>
        <p>Roll Number: ". $rollnumber ."</p>
        <p>Email: ". $emailid ."</p>
        <p>Department: ". $department ."</p>
        <form onsubmit='submitForm(this); return false;'>
          <input type='number' name='event_mark' min='0' max='100' placeholder='Enter marks' required>
          <button type='submit' onclick='store".$num."()'>Submit</button>
        </form>
        </div>
        <script>
          function store".$num."(){
            header('Location: submitmark.php?rollnumber=".$rollnumber."'); 
          }
        </script>";
        $num=$num+1;
    }
} else {
    echo "<h3>No upcomming events found in ". $eventname ."</h3>";
}
echo"</div>";

$conn->close();
?>
