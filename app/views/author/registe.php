<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Include your CSS stylesheets here -->
</head>
<body>

    <h2>User Registration</h2>

    <form id="registrationForm">
        <label for="nom">Name:</label>
        <input type="text" id="nom" name="nom" required>
        <br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" required>
        <br>

        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="author">Author</option>
            <option value="admin">Admin</option>
        </select>
        <br>

        <button type="button" onclick="registerUser()">Register</button>
    </form>

    <!-- Include your JavaScript files here, e.g., jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="user.js"></script>
</body>
</html>