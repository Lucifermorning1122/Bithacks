<?php
include 'connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$eventname = $_GET['event'];
$eventtype = $_GET['type'];
$rollnumber = $_GET['rollnumber'];

$sql = "SELECT * FROM events WHERE name='$eventname' AND event_type='$eventtype'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sdate = $row['start_date'];
        $edate = $row['end_date'];
        $venue = $row['venue'];
        $stime = $row['start_time'];
        $etime = $row['start_time'];
        $description = $row['description'];
        $eligibility = $row['eligibility'];
        $link = $row['filename'];
        
        
        echo 
        "
            <div class='brochure'>
                <h1 class='blinking' align='center'>". $eventname ."</h1>
                <p class='bold-words'> <span class='animated-text bold'><i class='fa fa-calendar'></i> &nbsp; Start Date: " . $sdate . " @ " . $stime . "</span></p>
                <p class='bold-words'> <span class='animated-text bold'><i class='fa fa-calendar'></i> &nbsp; End Date: " . $edate . " @ " . $etime . "</span></p>
                 
                <p class='bold-words'> <i class='icon-venue'></i><span class='animated-text bold'><i class='fas fa-map-marker-alt'></i> &nbsp; Venue: ". $venue ."</span></p>
                <p class='bold-words'> <span class='animated-text bold'> <i class='fas fa-list'></i> &nbsp; Description: ". $description ."</span></p>
                <p class='bold-words'> <span class='animated-text bold'> <i class='fas fa-user-graduate'></i> &nbsp; Eligibility: ". $eligibility ."</span></p>
                <a href='". $link ."' class='download-link'>View Brochure</a>
            ";
    }
}

$sql2 = "SELECT * FROM $eventname WHERE rollnumber='$rollnumber'";
$result2 = $conn->query($sql2);
if ($result2->num_rows == 0) {
    echo"<a href='regnow.php?rollnumber=".$rollnumber."&event=".$eventname."' class='download-link'>Register now</a>";
}
else{
    echo"<a class='download-link'>you have already regitered</a>";
};

echo"</div>
<script>
    window.location.reload();
</script>";
$conn->close();
?>
