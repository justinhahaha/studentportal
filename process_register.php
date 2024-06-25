<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $ic_no = mysqli_real_escape_string($conn, $_POST['ic_no']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    // Handle file upload
    $certificationFileName = $_FILES['certification']['name'];
    $certificationTempName = $_FILES['certification']['tmp_name'];
    $certificationPath = "uploads/" . $certificationFileName;
    move_uploaded_file($certificationTempName, $certificationPath);

    $sql = "INSERT INTO student_registration (name, ic_no, age, address, certification_path, course) VALUES ('$name', '$ic_no', '$age', '$address', '$certificationPath', '$course')";

    if (mysqli_query($conn, $sql)) {
        // Display success message using JavaScript pop-up
        echo '<script>alert("Thank you! Your registration has been submitted."); window.location.href = "index.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
