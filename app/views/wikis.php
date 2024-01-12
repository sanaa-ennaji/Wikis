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
               
                <form id="addWikiForm">
                    <div class="form-group">
                        <label for="wikiTitle">Wiki Title:</label>
                        <input type="text" class="form-control" id="wikiTitle" name="wikiTitle" required>
                    </div>
                    <div class="form-group">
                        <label for="wikiContent">Wiki Content:</label>
                        <textarea class="form-control" id="wikiContent" name="wikiContent" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categorySelect">Select Category:</label>
                        <select class="form-control" id="categorySelect" name="categorySelect" required>
                        <?php
                       
                                $categoriesData = json_decode($categoryController->getAllCategories(), true);

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


    $.ajax({
        url: '../controllers/WikiController.php?createWiki',
        method: 'POST',
        dataType: 'json',
        data: {
            action: 'createWiki',
            titre: wikiTitle,
            contenu: wikiContent,
            id_categorie: selectedCategory
         
        },
        success: function(response) {
            if (response.status === 'success') {
                console.log(response.message);

                $('#addWikiModal').modal('hide');

                wikiTable.ajax.reload();
            } else {
                console.error(response.message);
            }
        },
        error: function(xhr, status, error) {
            
            console.error(error);
        }
    });
});


window.editWiki = function(id) {
   
    $('#editWikiModal').modal('show');

    
    $.ajax({
        url: '../controllers/WikiController.php?getWikiById', 
        method: 'GET',
        dataType: 'json',
        data: {
            id: id
        },
        success: function(response) {
            if (response.status === 'success') {
               
                $('#editWikiTitle').val(response.data.titre);
                $('#editWikiContent').val(response.data.contenu);
             
            } else {
             
                console.error(response.message);
            }
        },
        error: function(xhr, status, error) {
           
            console.error(error);
        }
    });
};


window.deleteWiki = function(id) {
    
    if (confirm('Are you sure you want to delete this wiki?')) {
     
        $.ajax({
            url: '../controllers/WikiController.php?deleteWiki', 
            method: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if (response.status === 'success') {
                 
                    wikiTable.ajax.reload();
                } else {
                 
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
