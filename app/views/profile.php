
<?php
session_start();
if (!isset($_SESSION['user']['id'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
</head>
<body>
    <h1>Welcome, <?php echo $user['name_user']; ?>!</h1>
    <p>Email: <?php echo $user['email']; ?></p>
    <p>Role: <?php echo $user['role']; ?></p>

    <a href="logout.php">Logout</a>
</body>
</html>
