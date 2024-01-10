<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Include your CSS stylesheets here -->
</head>
<body>

    <h2>User Login</h2>

    <form id="loginForm">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" required>
        <br>

        <button type="button" onclick="loginUser()">Login</button>
    </form>

    <!-- Include your JavaScript files here, e.g., jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="user.js"></script>
</body>
</html>
