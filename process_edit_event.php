<?php
session_start();

// Check if the 'student_email' session variable is set
if (isset($_SESSION['student_email'])) {
    // Include database connection
    include 'db_connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $event_id = mysqli_real_escape_string($conn, $_POST['id']);
        $event_title = mysqli_real_escape_string($conn, $_POST['event_title']);
        $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);

        // Update the event in the database
        $update_query = "UPDATE calendar_events SET event_title = '$event_title', event_date = '$event_date' WHERE id = $event_id";

        if (mysqli_query($conn, $update_query)) {
            header("Location: student_dashboard.php");
        } else {
            echo "<p>Error updating event: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p>Invalid request.</p>";
    }

    // Logout link
    echo "<p><a href='logout.php'>Logout</a></p>";

    mysqli_close($conn);
} else {
    echo "Session not properly initialized.";
}
?>
