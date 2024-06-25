<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $announcement_id = mysqli_real_escape_string($conn, $_POST['id']);
    $announcement_text = mysqli_real_escape_string($conn, $_POST['announcement_text']);

    $update_query = "UPDATE announcements SET announcement_text = '$announcement_text' WHERE id = $announcement_id";

    if (mysqli_query($conn, $update_query)) {
        header("Location: management_dashboard.php");
    } else {
        echo "Error updating announcement: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
