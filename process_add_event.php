<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_title = mysqli_real_escape_string($conn, $_POST['event_title']);
    $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);

    $insert_query = "INSERT INTO calendar_events (event_title, event_date) VALUES ('$event_title', '$event_date')";

    if (mysqli_query($conn, $insert_query)) {
        header("Location: student_dashboard.php");
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
