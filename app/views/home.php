<?php  require_once '../controllers/CategoryController.php'; ?>
<?php  require_once '../controllers/WikiController.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wikis</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row" id="wikisContainer">
       
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function () {
        // Fetch wikis using AJAX
        $.ajax({
            url: '../controllers/WikiController.php?getAllWikis=true',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    displayWikis(response.data);
                } else {
                    console.error('Error fetching wikis:', response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX request failed:', status, error);
            }
        });

        function displayWikis(wikis) {
            var wikisContainer = $('#wikisContainer');

            wikis.forEach(function (wiki) {
                var tags = wiki.tags ? wiki.tags.join(', ') : 'No tags available';

                var wikiCard = `
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="${wiki.image_url}" class="card-img-top" alt="Wiki Image">
                            <div class="card-body">
                                <h5 class="card-title">${wiki.titre}</h5>
                                <p class="card-text">Author: ${wiki.auteur}</p>
                                <p class="card-text">Category: ${wiki.categorie}</p>
                                <p class="card-text">Tags: ${tags}</p>
                            </div>
                        </div>
                    </div>
                `;

                wikisContainer.append(wikiCard);
            });
        }
    });
</script>




</body>

</html>
