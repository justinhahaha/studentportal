<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Edit Event</title>
    <!-- <style>
        /* Add your styles for the modal here */
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
    </style>  -->
</head>
<body>

<?php
session_start();

// Check if the 'student_email' session variable is set
if (isset($_SESSION['student_email'])) {
    // Include database connection
    include 'db_connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $event_id = mysqli_real_escape_string($conn, $_GET['id']);

        // Fetch the event details
        $event_query = "SELECT * FROM calendar_events WHERE id = $event_id";
        $event_result = mysqli_query($conn, $event_query);

        if (mysqli_num_rows($event_result) > 0) {
            $event = mysqli_fetch_assoc($event_result);

            // Popup form for editing the event
            echo "<div id='editEventPopup' class='modal'>";
            echo "<h2>Edit Event</h2>";
            echo "<form action='process_edit_event.php' method='post'>";
            echo "<input type='hidden' name='id' value='{$event['id']}'>";
            echo "<label for='event_title'>Event Title:</label>";
            echo "<input type='text' id='event_title' name='event_title' value='{$event['event_title']}' required><br>";
            echo "<label for='event_date'>Event Date:</label>";
            echo "<input type='date' id='event_date' name='event_date' value='{$event['event_date']}' required><br>";
            echo "<input type='submit' value='Save Changes'>";
            echo "<a href='javascript:void(0);' onclick='closePopup()'>Cancel</a>";
            echo "</form>";
            echo "</div>";

            // JavaScript to handle opening and closing the popup
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function () {
                        openPopup();
                    });

                    function openPopup() {
                        document.getElementById('editEventPopup').style.display = 'block';
                    }

                    function closePopup() {
                        document.getElementById('editEventPopup').style.display = 'none';
                        window.location.href = 'student_dashboard.php'; // Redirect to student_dashboard.php
                    }
                </script>";
        } else {
            echo "<p>Event not found.</p>";
        }
    } else {
        echo "<p>Invalid request.</p>";
    }

 

    mysqli_close($conn);
} else {
    echo "Session not properly initialized.";
}
?>

</body>
</html>
