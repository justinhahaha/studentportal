<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $announcement_id = mysqli_real_escape_string($conn, $_GET['id']);

    $delete_query = "DELETE FROM announcements WHERE id = $announcement_id";

    if (mysqli_query($conn, $delete_query)) {
        header("Location: management_dashboard.php");
    } else {
        echo "Error deleting announcement: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
