<?php require_once '../controllers/TagController.php'; 
require_once '../services/serviceTag.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tags</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        // tags.js

$(document).ready(function() {
    // Function to handle displaying the modal
    function displayModal() {
        // Your code to show the modal here
        $('#tagModal').removeClass('hidden');
    }

    // Event listener for the button click
    $('#addTagBtn').click(function() {
        displayModal();
    });

    // Event listener for cancel button in the modal
    $('#cancelBtn').click(function() {
        // Your code to hide the modal here
        $('#tagModal').addClass('hidden');
    });
    
    // Add more event listeners or functionality as needed
});

    </script>
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-8">
    <button id="addTagBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Add Tag</button>

    <table id="tagsTable" class="stripe hover" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Fetch and display all tags
        $tags = $tagsService->getTags();

        foreach ($tags as $tag) {
            echo "<tr>";
            
            // Check if the array keys exist before accessing them
            $idTag = isset($tag['ID_tag']) ? $tag['ID_tag'] : '';
            $tagName = isset($tag['tag_name']) ? $tag['tag_name'] : '';

            echo "<td>{$idTag}</td>";
            echo "<td>{$tagName}</td>";
            echo "<td>Edit/Delete</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<!-- Modal for Add/Edit Tag -->
<div id="tagModal" class="hidden fixed inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white w-1/2 p-8 rounded shadow-lg">
            <form id="tagForm">
                <input type="hidden" id="tagId" name="tag_id">
                <label for="tagName" class="block text-sm font-medium text-gray-700">Tag Name:</label>
                <input type="text" id="tagName" name="nom_tag" class="mt-1 p-2 border rounded-md w-full" required>
                <div class="mt-4 flex justify-end">
                    <button type="button" id="cancelBtn" class="mr-2 px-4 py-2 text-white bg-gray-500 rounded-md">Cancel</button>
                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <script src="tag.js"></script> -->
</body>
</html>
