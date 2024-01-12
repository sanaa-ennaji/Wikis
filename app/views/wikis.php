<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki Management</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include DataTables CSS/JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2>Wiki Management</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addWikiModal">
        Add Wiki
    </button>
    <table id="wikiTable" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Wikis data will be populated here -->
        </tbody>
    </table>
</div>

<!-- Add Wiki Modal -->
<div class="modal" id="addWikiModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Wiki</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for adding a new wiki -->
                <form id="addWikiForm">
                    <!-- Add your input fields for title, content, etc. -->
                    <button type="submit" class="btn btn-primary">Add Wiki</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include scripts for WikiController.js and Bootstrap JS -->
<script src="WikiController.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>$(document).ready(function() {
    // Initialize DataTable
    var wikiTable = $('#wikiTable').DataTable({
        ajax: 'WikiController.php?getAllWikis',
        columns: [
            { data: 'id_wiki' },
            { data: 'titre' },
            { data: 'contenu' },
            {
                data: null,
                render: function(data, type, row) {
                    return '<button onclick="editWiki(' + row.id_wiki + ')">Edit</button>' +
                           '<button onclick="deleteWiki(' + row.id_wiki + ')">Delete</button>';
                }
            }
        ]
    });

    // Add Wiki Form Submission
    $('#addWikiForm').submit(function(event) {
        event.preventDefault();

        // Get data from the form and implement logic to add a wiki using AJAX
        // ...

        // Close the modal
        $('#addWikiModal').modal('hide');

        // Reload DataTable to update the table
        wikiTable.ajax.reload();
    });

    // Function to edit a wiki
    window.editWiki = function(id) {
        // Implement your edit logic here
        console.log('Edit wiki with ID: ' + id);
    };

    // Function to delete a wiki
    window.deleteWiki = function(id) {
        // Implement your delete logic here
        console.log('Delete wiki with ID: ' + id);
    };
});
</script>
</body>
</html>
