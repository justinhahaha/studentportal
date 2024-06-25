<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login - University Portal</title>
</head>
<body class="login-page">

    <h1 class="login-heading">Login</h1>
    
    <form action="process_login.php" method="post" class="login-form">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="user_type">User Type:</label>
        <select id="user_type" name="user_type" required>
            <option value="student">Student</option>
            <option value="management">Management</option>
        </select><br>

        <input type="submit" value="Login">
    </form>

    <p class="login-message">
        Don't have an account? <a href="signup.php">Sign Up</a><br>
    </p>

    <button class="go-back-button" onclick="window.location.href = 'index.php';">Go Back</button>
</body>
</html>
