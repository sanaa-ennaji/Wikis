<?php
require_once '../../controllers/categoryController/displayCategory.php';

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
   <style>
    nav{
        background-color: blueviolet;
        
    }
    main{
        position: absolute;
        right:  2rem;

    }
   </style>
</head>
<body>
    
<?php
include 'component/sidebar.php';
?>



<main id="main" class="bg-gray-100 flex-grow h-[100vh] w-[80vw]  ">
   

    <div class="md:p-6 bg-white md:m-5">
        <div class="flex items-center justify-between">
            <div></div>
            <div>
                <button class="bg-purple-700 text-white w-[160px] h-[50px] rounded-md" id="addCategoryBtn">
                    Add Category
                </button>
            </div>
        </div>


        <div class="hidden md:block rounded-lg overflow-hidden mt-10">
            <table class="w-full" id="table1">
                <thead class="sm:w-full">
                    <tr class="bg-purple-700 text-white h-[60px]">
                        <th class="">ID</th>
                        <th class="">nameCategorie</th>
                        <th class="">Description</th>
                        <th class="">picture</th>
                        <th class="">Actions</th>
                    </tr>
                </thead>
                <tbody class="sm:w-full">
                    <?php foreach($categoryData as $CatData) { ?>
                        <tr class="pt-10 sm:pt-0 w-full ">
                            <td class="sm:text-center text-right"><?php echo $CatData['idCategory'] ?></td>
                            <td class="sm:text-center text-right"><?php echo $CatData['nameCategory'] ?></td>
                            <td class="sm:text-center text-right"><?php echo $CatData['description'] ?></td>
                            <td class="sm:text-center text-right">
                                <div class="flex items-center justify-center">
                                    <?php
                                    $cheminImage = $CatData['pictureCategory'];
                                    echo "<img class='w-[50px] h-[50px]' src='$cheminImage' alt='image de categorie'>";
                                    ?>
                                </div>
                            </td>
                            <td class="sm:text-center text-right">
                                <button class="bg-green-800 text-white w-[35px] h-[35px] rounded-md">
                                    <a href="updateCategory.php?idCategory=<?= $CatData['idCategory'];?>">
                                        <i class="fa-solid fa-pen " style="color:#1D2B53"></i>
                                    </a>
                                </button>
                                <button class="bg-green-800 text-white w-[35px] h-[35px] rounded-md">
                                    <a href="../../../Controllers/CategoryController/deleteCategoryController.php?idCategory=<?= $CatData['idCategory'];?>">
                                        <i class="fa-solid fa-trash " style="color:#1D2B53"></i>
                                    </a>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
      

        <!-- Add Category Popup -->
        <div id="addCategoryPopup" class="hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white w-[500px] p-8 rounded-lg">
                <h2 class="text-2xl font-bold mb-4">Add Category</h2>
                <form action="../../controllers/categoryController/addCategory.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700"  for="username">Name</label>
                        <input type="text" id="Name" type="text" name="nameCategory" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700"  for="description">Description</label>
                        <textarea id="Name" type="text" name="description" class="mt-1 p-2 w-full border rounded-md"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" name="pictureCategory" accept="image/*" class="mt-1">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-purple-700 text-white px-4 py-2 rounded-md">Add</button>
                        <button type="button" id="closeAddCategoryPopup" class="bg-gray-400 text-gray-800 ml-2 px-4 py-2 rounded-md">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
  

</main>
<script src="https://cdn.tailwindcss.com"></script>
 <script src="https://kit.fontawesome.com/d0fb25e48c.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#table1').DataTable();
    });
    $(document).ready(function () {
        $('#table2').DataTable();
    });

  
    $(document).ready(function () {
        $('#addCategoryBtn').on('click', function () {
            $('#addCategoryPopup').removeClass('hidden');
        });

        $('#closeAddCategoryPopup').on('click', function () {
            $('#addCategoryPopup').addClass('hidden');
        });
    });
</script>

</body>

</html>

