<?php  require_once '../controllers/UserController.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>

<h2>User Registration</h2>

<form action="../controllers/UserController.php" method="post">
    <!-- User Registration Form -->
    <label for="nom">Name:</label>
    <input type="text" id="nom" name="nom" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="pass">Password:</label>
    <input type="password" id="pass" name="pass" required><br>

    <input type="hidden" name="action" value="register">

    <button type="submit">Register</button>
</form>

</body>
</html>

