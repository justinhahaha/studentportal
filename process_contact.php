<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $question = mysqli_real_escape_string($conn, $_POST['question']);

    $sql = "INSERT INTO contact_form (name, email, question) VALUES ('$name', '$email', '$question')";

    if (mysqli_query($conn, $sql)) {
        // Display success message using JavaScript pop-up
        echo '<script>alert("Thank you! Your question has been submitted."); window.location.href = "index.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
