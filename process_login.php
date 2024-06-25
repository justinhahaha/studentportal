<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

    // Perform authentication check
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND user_type = '$user_type'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        session_start();

        if ($user_type === 'student') {
            $_SESSION['student_email'] = $email;
            header("Location: student_dashboard.php");
        } elseif ($user_type === 'management') {
            $_SESSION['management_email'] = $email;
            header("Location: management_dashboard.php");
        }

        exit();
    } else {
        echo '<script>alert("Invalid login credentials. Please try again.");';
        echo 'window.location.href = "portal.php";</script>';
    }
}

mysqli_close($conn);
?>
