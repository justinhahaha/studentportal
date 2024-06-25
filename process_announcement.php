<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $announcement_text = mysqli_real_escape_string($conn, $_POST['announcement_text']);
    $post_date = date('Y-m-d H:i:s');

    // File Upload
    $upload_directory = 'uploads/';
    $file_name = $_FILES['announcement_file']['name'];
    $file_temp = $_FILES['announcement_file']['tmp_name'];
    $file_path = $upload_directory . $file_name;

    move_uploaded_file($file_temp, $file_path);

    $insert_query = "INSERT INTO announcements (announcement_text, post_date, file_path) VALUES ('$announcement_text', '$post_date', '$file_path')";

    if (mysqli_query($conn, $insert_query)) {
        header("Location: management_dashboard.php");
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
