<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - University Portal</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
session_start();

if (isset($_SESSION['student_email'])) {
    include 'db_connection.php';
    $email = $_SESSION['student_email'];
    $profile_query = "SELECT name, email FROM users WHERE email = '$email'";
    $profile_result = mysqli_query($conn, $profile_query);
    
    if (mysqli_num_rows($profile_result) > 0) {
        $profile = mysqli_fetch_assoc($profile_result);
        echo "<div class='content-above-table'>";
        echo "<h2>Welcome, {$profile['name']}!</h2>";
        echo "<p>{$profile['email']}</p>";
        echo "</div>";
    } else {
        echo "<p>Profile not found.</p>";
    }
    
    $announcement_query = "SELECT * FROM announcements";
    $announcement_result = mysqli_query($conn, $announcement_query);
    
    if (mysqli_num_rows($announcement_result) > 0) {
        echo "<div class='announcement-container'>";
        echo "<h2 class='announcement-title'>Announcements</h2>";
        echo "<ul class='announcement-list'>";
        while ($row = mysqli_fetch_assoc($announcement_result)) {
            echo "<li class='announcement-item'>{$row['announcement_text']} - {$row['post_date']} 
                  <a class='announcement-link' href='{$row['file_path']}' target='_blank'>View Attachment</a></li>";
        }
        echo "</ul>";
        echo "</div>";
    } else {
        echo "<p>No announcements available.</p>";
    }
    
    echo "<h2>Calendar</h2>";
    $calendar_query = "SELECT * FROM calendar_events";
    $calendar_result = mysqli_query($conn, $calendar_query);
    
    if (mysqli_num_rows($calendar_result) > 0) {
        echo "<table>
                <tr>
                    <th>Event Title</th>
                    <th>Event Date</th>
                    <th>Action</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($calendar_result)) {
            echo "<tr>
                    <td>{$row['event_title']}</td>
                    <td>{$row['event_date']}</td>
                    <td>
                        <a class='edit-link' href='edit_event.php?id={$row['id']}'>Edit</a>
                        <a class='delete-link' href='delete_event.php?id={$row['id']}'>Delete</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No events available.</p>";
    }
    echo "<br>";
    echo "<h3>Add Event</h3>";
    echo "<form action='process_add_event.php' method='post'>";
    echo "<label for='event_title'>Event Title:</label>";
    echo "<input type='text' id='event_title' name='event_title' required><br>";
    echo "<label for='event_date'>Event Date:</label>";
    echo "<input type='date' id='event_date' name='event_date' required><br>";
    echo "<input type='submit' value='Add Event'>";
    echo "</form>";
    
    echo "<p><a href='logout.php' class='logout-link'>Logout</a></p>";

    mysqli_close($conn);
} else {
    echo "<p>Session not properly initialized.</p>";
}
?>

</body>
</html>
