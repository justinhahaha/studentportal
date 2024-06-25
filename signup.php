<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Sign Up - University Portal</title>
</head>
<body class="signup-page">

    <h1 class="signup-heading">Sign Up</h1>
    
    <form action="process_signup.php" method="post" class="signup-form">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="user_type">User Type:</label>
        <select id="user_type" name="user_type" required>
            <option value="student">Student</option>
            <option value="management">Management</option>
        </select><br>

        <input type="submit" value="Sign Up">
    </form>

    <button class="go-back-button" onclick="window.location.href = 'index.php';">Go Back</button>
</body>
</html>
