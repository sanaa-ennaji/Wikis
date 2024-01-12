<?php  require_once '../controllers/CategoryController.php'; ?>
<?php  require_once '../controllers/WikiController.php'; ?>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


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


<div class="modal" id="addWikiModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Wiki</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
                <form id="addWikiForm">
                    <div class="form-group">
                        <label for="wikiTitle">Wiki Title</label>
                        <input type="text" class="form-control" id="wikiTitle" name="wikiTitle" required>
                    </div>
                    <div class="form-group">
                        <label for="wikiContent">Wiki Content</label>
                        <textarea class="form-control" id="wikiContent" name="wikiContent" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categorySelect">Select Category</label>
                        <select class="form-control" id="categorySelect" name="categorySelect" required>
                            <?php
                               
                                $categoriesData = json_decode($categoryController->getAllCategories(),true);

                                if ($categoriesData['status'] === 'success') {
                                    foreach ($categoriesData['data'] as $category) {
                                        echo '<option value="' . $category['id_categorie'] . '">' . $category['nom_categorie'] . '</option>';
                                    }
                                } else {
                                    echo '<option value="">No categories available</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Wiki</button>
                 </form>
            </div>
        </div>
    </div>
</div>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>


$('#addWikiForm').submit(function(event) {
    event.preventDefault();

    // Get data from the form
    var wikiTitle = $('#wikiTitle').val();
    var wikiContent = $('#wikiContent').val(); 
    var selectedCategory = $('#categorySelect').val();

    // Implement your logic to add a wiki using AJAX
    $.ajax({
        url: '../controllers/WikiController.php?createWiki',
        method: 'POST',
        dataType: 'json',
        data: {
            action: 'createWiki',
            titre: wikiTitle,
            contenu: wikiContent,
            id_categorie: selectedCategory
            // Add more data fields as needed
        },
        success: function(response) {
            if (response.status === 'success') {
                // Wiki added successfully
                console.log(response.message);

                // Close the modal
                $('#addWikiModal').modal('hide');

                // Reload DataTable to update the table
                wikiTable.ajax.reload();
            } else {
                // Handle errors if needed
                console.error(response.message);
            }
        },
        error: function(xhr, status, error) {
            // Handle AJAX errors
            console.error(error);
        }
    });
});

// Function to edit a wiki
window.editWiki = function(id) {
    // Assuming you have a modal for editing wikis with the ID "editWikiModal"
    $('#editWikiModal').modal('show');

    // Fetch the existing data for the wiki with the specified ID using AJAX
    $.ajax({
        url: '../controllers/WikiController.php?getWikiById', // Adjust the endpoint accordingly
        method: 'GET',
        dataType: 'json',
        data: {
            id: id
        },
        success: function(response) {
            if (response.status === 'success') {
                // Assuming you have input fields in your edit modal with IDs "editWikiTitle" and "editWikiContent"
                $('#editWikiTitle').val(response.data.titre);
                $('#editWikiContent').val(response.data.contenu);
                // Populate other fields as needed
            } else {
                // Handle errors if needed
                console.error(response.message);
            }
        },
        error: function(xhr, status, error) {
            // Handle AJAX errors
            console.error(error);
        }
    });
};

// Function to delete a wiki
window.deleteWiki = function(id) {
    // Show a confirmation modal
    if (confirm('Are you sure you want to delete this wiki?')) {
        // Implement your delete logic here
        $.ajax({
            url: '../controllers/WikiController.php?deleteWiki', // Adjust the endpoint accordingly
            method: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if (response.status === 'success') {
                    // Assuming you have a DataTable for wikis with the variable name "wikiTable"
                    // Reload DataTable to update the table
                    wikiTable.ajax.reload();
                } else {
                    // Handle errors if needed
                    console.error(response.message);
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                console.error(error);
            }
        });
    }
};

</script>
</body>
</html>
