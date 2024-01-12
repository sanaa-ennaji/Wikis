<?php  require_once '../controllers/CategoryController.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>


</head>

<body>

<!-- Add Category Button -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
    Add Category
</button>

<!-- Table to display categories -->
<table id="categoriesTable" class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Categories data will be populated here -->
    </tbody>
</table>

<!-- Add Category Modal -->
<div class="modal" id="addCategoryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for adding a new category -->
                <form id="addCategoryForm">
                    <div class="form-group">
                        <label for="categoryName">Category Name:</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Include DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<!-- Include Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Include DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        // DataTable initialization
        $('#categoriesTable').DataTable({
            ajax: {
                url: '../controllers/CategoryController.php?getAllCategories',
                type: 'GET',
                dataType: 'json',
                dataSrc: 'data', // Adjust to match the key in your response
            },
            columns: [
                { data: 'id_categorie' },
                { data: 'nom_categorie' },
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<button onclick="editCategory(' + row.id_categorie + ')">Edit</button>' +
                               '<button onclick="deleteCategory(' + row.id_categorie + ')">Delete</button>';
                    }
                }
            ]
        });

        // Add Category Form Submission
        $('#addCategoryForm').submit(function(event) {
            event.preventDefault();

            // Get category name from the form
            var categoryName = $('#categoryName').val();

            // Implement your logic to add a category using AJAX
            $.ajax({
                url: '../controllers/CategoryController.php?createCategory',
                method: 'POST',
                dataType: 'json',
                data: {
                    action: 'createCategory',
                    nom_categorie: categoryName
                },
                success: function(response) {
                    if (response.status === 'success') {
                        // Category added successfully
                        console.log(response.message);

                        // Close the modal
                        $('#addCategoryModal').modal('hide');

                        // Reload DataTable to update the table
                        $('#categoriesTable').DataTable().ajax.reload();
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

        // Example functions for editing and deleting categories
        function editCategory(categoryId) {
            // Implement your edit logic here
            console.log('Edit category with ID: ' + categoryId);
        }

        function deleteCategory(categoryId) {
            // Implement your delete logic here
            console.log('Delete category with ID: ' + categoryId);
        }
    });
</script>

</body>
</html>

