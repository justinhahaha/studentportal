<?php
session_start();
session_destroy();
header("Location: index.php"); // Redirect to the login page or any other page after logout
exit();
?>
