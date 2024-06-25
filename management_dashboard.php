<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Dashboard - University Portal</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="dashboard-page">

<?php
// Check if the 'management_email' session variable is set
if (isset($_SESSION['management_email'])) {
    // Include database connection
    include 'db_connection.php';

    echo "<div class='dashboard-container'>";
    echo "<h1 class='dashboard-heading'>Management Dashboard</h1>";

    // Announcement Section
    echo "<div class='dashboard-section'>";
    echo "<h2 class='section-heading'>Announcements</h2>";
    echo "<form action='process_announcement.php' method='post' enctype='multipart/form-data' class='announcement-form'>";
    echo "<label for='announcement_text'>New Announcement Text:</label>";
    echo "<textarea id='announcement_text' name='announcement_text' required></textarea><br>";

    echo "<label for='announcement_file'>Attach File (Image or PDF):</label>";
    echo "<input type='file' id='announcement_file' name='announcement_file'><br>";

    echo "<input type='submit' value='Post Announcement'>";
    echo "</form>";

    echo "<br><br>";

    // Fetch and display announcements
    $announcement_query = "SELECT * FROM announcements";
    $announcement_result = mysqli_query($conn, $announcement_query);

    if (mysqli_num_rows($announcement_result) > 0) {
        echo "<ul class='announcement-list'>";
        while ($row = mysqli_fetch_assoc($announcement_result)) {
            echo "<li class='announcement-item'>{$row['announcement_text']} - {$row['post_date']} 
                  <a href='{$row['file_path']}' target='_blank'>View Attachment</a>
                  <a href='process_delete_announcement.php?id={$row['id']}'>Delete</a></li>";
        }
        echo "</ul>";
    } else {
        echo "<p class='no-data-message'>No announcements available.</p>";
    }
    echo "</div>"; // Closing Announcement Section

    // New Registrations Section
    echo "<div class='dashboard-section'>";
    echo "<h2 class='section-heading'>New Registrations</h2>";

    // Fetch and display new registrations
    $registration_query = "SELECT * FROM student_registration";
    $registration_result = mysqli_query($conn, $registration_query);

    if (mysqli_num_rows($registration_result) > 0) {
        echo "<table class='registration-table' border='1'>
                <tr>
                    <th>Name</th>
                    <th>IC Number</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Certification Path</th>
                    <th>Course</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($registration_result)) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['ic_no']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['certification_path']}</td>
                    <td>{$row['course']}</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='no-data-message'>No new registrations available.</p>";
    }
    echo "</div>"; 

    // Contact Us Section
    echo "<div class='dashboard-section'>";
    echo "<h2 class='section-heading'>Contact Us</h2>";

    // Fetch and display contact messages
    $contact_query = "SELECT * FROM contact_form";
    $contact_result = mysqli_query($conn, $contact_query);

    if (mysqli_num_rows($contact_result) > 0) {
        echo "<table class='contact-table' border='1'>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Question</th>
                    <th>Action</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($contact_result)) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['question']}</td>
                    <td><a href='mailto:{$row['email']}?subject=Reply to Your Question' class='reply-link'>Reply</a></td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='no-data-message'>No contact messages available.</p>";
    }
    echo "</div>"; 

    // Logout link
    echo "<p class='logout-link'><a href='logout.php'>Logout</a></p>";

    echo "</div>"; 

    echo "</body></html>";

    mysqli_close($conn);
} else {
    echo "Session not properly initialized.";
}
?>
