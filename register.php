<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Register - University Portal</title>
</head>
<body>
    <h1>Student Registration</h1>
    
    <form action="process_register.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="ic_no">IC Number:</label>
        <input type="text" id="ic_no" name="ic_no" required><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br>

        <label for="certification">Related Certification (Upload Image):</label>
        <input type="file" id="certification" name="certification" accept="image/*" required><br>

        <label for="course">Course Interested:</label>
        <select id="course" name="course" required>
            <option value="Diploma in Computer Science">Diploma in Computer Science</option>
            <option value="Diploma in Business">Diploma in Business</option>
            <option value="Diploma in Culinary">Diploma in Culinary</option>
        </select><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
