<?php
session_start();

// Check if the 'student_email' session variable is set
if (isset($_SESSION['student_email'])) {
    // Include database connection
    include 'db_connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $event_id = mysqli_real_escape_string($conn, $_GET['id']);

        // Delete the event from the database
        $delete_query = "DELETE FROM calendar_events WHERE id = $event_id";

        if (mysqli_query($conn, $delete_query)) {
            // Use JavaScript to show a pop-up
            echo "<script>alert('Event deleted successfully.'); window.location.href='student_dashboard.php';</script>";
        } else {
            echo "<p>Error deleting event: " . mysqli_error($conn) . "</p>";
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
