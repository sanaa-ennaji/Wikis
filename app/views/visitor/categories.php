<?php
require_once '../../Controllers/categoryController/displayCategory.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/d0fb25e48c.js" crossorigin="anonymous"></script>
    <title>HomePage</title>
</head>

<body class="bg-gray-100">
    <!-- navbar -->
    <?php include 'navbar.php'; ?>

    <!-- =================mobile menu=============== -->

    <div class="container mx-auto my-6 flex items-center justify-center">
        <h3 class="font-black text-gray-800 md:text-3xl text-xl">All Categories</h3>
    </div>

    <div class="container mx-4 md:mx-16 mt-10 flex  justify-center">

        <?php
        foreach ($categoryData as $catData) {
        ?>
            <div class="w-full md:w-1/3 p-4 bg-white mb-4 md:mb-0 md:mr-2 shadow-lg rounded-md">

                <div class="relative flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">

                    <div class="w-full md:w-1/3 bg-white grid place-items-center">
                        <?php
                        $cheminImage = $catData['pictureCategory'];
                        echo "<img src='$cheminImage' alt='category image' class='rounded-xl' />"
                        ?>
                        <!-- <img src='w.png' alt='category image' class='rounded-xl' /> -->
                    </div>

                    <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
                        <h3 class="font-black text-gray-800 md:text-3xl text-xl">
                            <?php echo $catData['nameCategory'] ?>
                        </h3>
                        <p class="md:text-lg text-gray-500 text-base">
                            <?php echo $catData['description'] ?>
                        </p>
                       
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>


</body>

<?php include 'footer.php'; ?>
</html>
