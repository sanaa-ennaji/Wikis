<?php  require_once '../controllers/UserController.php'; ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include jQuery and DataTables CSS/JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

</head>
<body>

<div class="container mt-5">
    <h2>User List</h2>
    <table id="userTable" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <!-- User data will be populated here -->
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#userTable').DataTable({
            ajax: '../controllers/UserController.php', // Replace with the endpoint to fetch user data
            columns: [
                { data: 'id_user' },
                { data: 'name_user' },
                { data: 'email' },
                { data: 'role' }
            ]
        });
    });
</script>

</body>
</html>

