<?php
require_once '../../controllers/categoryController/displayCategory.php';
require_once '../../controllers/wikiController/displayLastWiki.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/d0fb25e48c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>HomePage</title>
</head>

<body class="bg-white">
    <?php include'navbar.php'; ?>
          


    <div class="container mx-4 md:mx-16 mt-10 flex flex-wrap md:flex-nowrap">

        <div class="w-full md:w-2/3 p-4 bg-white mb-4 md:mb-0 md:mr-2 shadow-lg rounded-md">
            <h1 class="text-gray-800 text-4xl font-bold mt-2 mb-2 leading-tight">
               lastest wikis
            </h1>
            <?php
            foreach($WikiDatas as $WikiData){
            ?>
            <div class="mb-4 lg:mb-10 p-4 lg:p-0 w-full md:w-4/7 relative rounded block">
                <?php $cheminImage = $WikiData['pictureWiki'];
                echo "<img src='$cheminImage' class='rounded-md object-cover w-full h-64'>"
                ?>
                <?php
                        foreach($categoryData as $catData){
                            if ($catData['idCategory'] == $WikiData['idCategory']) {
                        ?>

                <span class="text-green-700 text-sm hidden md:block mt-4"> <?php echo $catData['nameCategory']?> </span>
                <?php
                            }
                        }
                        ?>
                <h1 class="text-gray-800 text-4xl font-bold mt-2 mb-2 leading-tight">
                    <?php echo $WikiData['title'] ?>
                </h1>
                <p class="text-gray-600 mb-4">
                    <?php echo $WikiData['summarize'] ?>
                </p>
               
            </div>

            <?php
            }
            ?>
           
        </div>
        

    </div>
    <div class=" mt-10 mb-10">
    <a href="wikis.php" class="bg-purple-700 text-white px-10 py-5 rounded ml-[77%] ">Show more wikis -></a>
    </div>
    <?php include 'footer.php'; ?>

</body>

</html>