<?php
require_once  '../../controllers/wikiController/Wiki.php';
require_once '../../controllers/CategoryController/displayCategory.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ========== Tailwind Css ========  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ========== AwesomeFonts Css ========  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/d0fb25e48c.js" crossorigin="anonymous"></script>
    <title>HomePage</title>
</head>

<body class="bg-gray-100">
    <!-- navbar -->
 <?php include'navbar.php'; ?>
     <!-- navbar-end -->

<!-- search bar -->
<div class="relative mx-auto w-64 md:w-96 mt-5">
    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <svg class="w-6 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                clip-rule="evenodd"></path>
        </svg>
    </div>
    <input type="text" id="email-adress-icon"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2"
        placeholder="Search...">
</div>

<!-- search bar end -->
     <section class="py-6 sm:py-12 dark:bg-gray-800 dark:text-gray-100">
	<div class="container p-6 mx-auto space-y-8">
		<div class="space-y-2 text-center">
			<h2 class="text-3xl font-bold">welcome to our vibrant and collaborative world</h2>
			<p class="font-serif text-sm dark:text-gray-400">Our wiki community serves as an expansive digital.</p>
		</div>

		<div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">

   
			<article class="flex flex-col dark:bg-gray-900">
				<a rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum">
					<img alt="" class="object-cover w-full h-52 dark:bg-gray-500" src="w.png">
				</a>
				<div class="flex flex-col flex-1 p-6">
					<a rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum"></a>
					<a rel="noopener noreferrer" href="#" class="text-xs tracki uppercase hover:underline dark:text-violet-400">astronomy</a>
					<h3 class="flex-1 py-2 text-lg font-semibold leadi">Te nulla oportere reprimique his dolorum</h3>
					<div class="flex flex-wrap justify-between pt-3 space-x-2 text-xs dark:text-gray-400">
          <span>June 15, 2024</span>
						<span>2.2K views</span>
					</div>
				</div>
			</article>

        <?php
            foreach ($WikiDatas as $WikiData){
            ?>
			<article class="flex flex-col dark:bg-gray-900">
				
				<a href="wikiDetaille.php?idWiki= <?= $WikiData['idWiki'];?>" rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum">
				<?php 
                $cheminImage = $WikiData['pictureWiki'];
				echo" <img src='$cheminImage' class='object-cover w-full h-52 dark:bg-gray-500'>"
				?>
					<!-- <img alt="" class="object-cover w-full h-52 dark:bg-gray-500" src="../Captur.png"> -->
				</a>


				</a>
				<div class="flex flex-col flex-1 p-6">
					<a rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum"></a>
                    <?php
                foreach($categoryData as $catData){
                if ($catData['idCategory'] == $WikiData['idCategory']) {
                ?>
					<a rel="noopener noreferrer" href="#" class="text-xs tracki uppercase hover:underline dark:text-violet-400">CATEGORy: <?php echo $catData['nameCategory']?></a>
					<?php
                            }
                        }
                        ?>
						<h1 class="flex-1 py-2 text-lg font-semibold leadi"> title:<?php echo $WikiData['title'] ?> </h1>
					<p class="flex-1 py-2 text-lg  leadi">content: <?php echo $WikiData['summarize'] ?></p>
					<div class="flex flex-wrap justify-between pt-3 space-x-2 text-xs dark:text-gray-400">
          <span>June 16, 2024</span>
						<span>2.2K views</span>
					</div>
				</div>
			</article>
            <?php
            }
            ?>
		</div>
	</div>
</section>

<!--Footer -->
<?php include 'footer.php'; ?>

    <!-- footer end -->
    <script src="../../../../public/js/main.js"></script>
</body>

</html>