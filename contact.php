<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Contact Us - University Portal</title>
</head>
<body>
    <h1>Contact Us</h1>

    <div class="contact-info">
        <h2>University Information</h2>
        <p><strong>Name:</strong>Bean's University</p>
        <p><strong>Email:</strong> info@beanuniversity.com</p>
        <p><strong>Address:</strong> Jln Lbh Cemerlang, Taman Desa Cemerlang, 81800 Ulu Tiram, Johor, Malaysia</p>
        <p><strong>Phone:</strong> +6011 456-7890</p>
    </div>
    
    <form action="process_contact.php" method="post">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="question">Your Question:</label>
        <textarea id="question" name="question" required></textarea><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
