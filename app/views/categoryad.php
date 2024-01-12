<?php  require_once '../controllers/CategoryController.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>


</head>

<body>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
    Add Category
</button>


<table id="categoriesTable" class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    
    </tbody>
</table>


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

        $('#categoriesTable').DataTable({
            ajax: {
                url: '../controllers/CategoryController.php?getAllCategories',
                type: 'GET',
                dataType: 'json',
                dataSrc: 'data', 
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


        $('#addCategoryForm').submit(function(event) {
            event.preventDefault();

       
            var categoryName = $('#categoryName').val();

         
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
                      
                        console.log(response.message);

                        // Close the modal
                        $('#addCategoryModal').modal('hide');

                        $('#categoriesTable').DataTable().ajax.reload();
                    } else {
                       
                        console.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                 
                    console.error(error);
                }
            });
        });

      
        function editCategory(categoryId) {
     
            console.log('Edit category with ID: ' + categoryId);
        }

        function deleteCategory(categoryId) {
         
            console.log('Delete category with ID: ' + categoryId);
        }
    });
</script>

</body>
</html>

