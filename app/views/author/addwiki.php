<?php
require_once '../../controllers/categoryController/displayCategory.php';
 require_once '../../controllers/tagController/displayTag.php';

 ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.tailwindcss.com"></script>
     <script src="https://kit.fontawesome.com/d0fb25e48c.js" crossorigin="anonymous"></script>

     <title>AddWiki</title>
 </head>

 <body>
     <!--================form-add-Assurance================ -->
     <section class="max-w-4xl p-6 mx-auto bg-gray-200 rounded-md shadow-xl shadow-gray-300  mt-36">
         <h1 class="text-xl font-bold text-black capitalize dblack">Add Wiki</h1>
         <form action="../../controllers/wikiController/addWiki.php" method="POST"
             enctype="multipart/form-data">
             <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                 <div>
                     <label class="text-black " for="username">title</label>
                     <input id="title" type="text" name="title"
                         class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md     focus:outline-none focus:ring">
                 </div>

                 <div>
                     <label class="text-black " for="sammurize">sammurize</label>
                     <textarea id="sammurize" type="text" name="sammurize"
                         class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md     focus:outline-none focus:ring"></textarea>
                 </div>

                 <div>
                     <label class="text-black " for="content">content</label>
                     <textarea id="content" type="text" name="content"
                         class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md     focus:outline-none focus:ring"></textarea>
                 </div>

                 <div>
                     <label class="text-black dark:text-gray-200" for="passwordConfirmation">Select category</label>
                     <select name="idCategory"
                         class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md     focus:outline-none focus:ring">
                         <option value=" 0">chose Category</option>
                         <?php
            
                            foreach($categoryData as $allcategoryData) {
                                echo "<option value='" . $allcategoryData['idCategory'] . "' >" . $allcategoryData['nameCategory'] . "</option>";
                            }
                            ?>
                     </select>
                 </div>

                 <!-- tags start -->
                 <div class="mb-4">
                     <label for="tags" class="block text-sm font-medium text-gray-600">Sélectionner les tags :</label>
                     <div class="flex flex-wrap gap-2">
                         <?php foreach ($TagDatas as $TagData) : ?>
                         <label class="inline-flex items-center">
                             <input type="checkbox" name="selectedTags[]" value="<?= $TagData['idTag'] ?>"
                                 class="form-checkbox h-5 w-5 text-blue-600">
                             <span class="ml-2 text-gray-700"><?= $TagData['nameTag'] ?></span>
                         </label>
                         <?php endforeach; ?>

                     </div>
                 </div>
                 <!-- 
                 <div class="mb-4">
                     <label for="tags" class="block text-sm font-medium text-gray-600">Sélectionner les tags :</label>
                     <div class="flex flex-wrap gap-2">
                         <select name="selectedTags[]" multiple
                             class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md     focus:outline-none focus:ring">

                             <?php
            
                            // foreach($TagDatas as $TagData) {
                            //     echo "<option value='" . $TagData['idTag'] . "' >" . $TagData['nameTag'] . "</option>";
                            // }
                            ?>
                         </select>

                         <button type="button" onclick="addSelectedTag()"
                             class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md">Ajouter Tag</button>
                     </div>
                 </div> -->
                 <!-- <div class="mb-4">
                     <p class="text-sm font-medium text-gray-600 mb-2">Tags sélectionnés :</p>
                     <div id="selectedTagsContainer" class="flex flex-wrap gap-2"></div>
                 </div> -->

                 <!-- tags end -->

                 <div>
                     <label class="block text-sm font-medium text-black">
                         picture
                     </label>
                     <div
                         class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-black border-dashed rounded-md">
                         <div class="space-y-1 text-center">
                             <svg class="mx-auto h-12 w-12 text-black" stroke="currentColor" fill="none"
                                 viewBox="0 0 48 48" aria-hidden="true">
                                 <path
                                     d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                             </svg>
                             <div class="flex text-sm text-gray-600">
                                 <label for="file-upload"
                                     class="relative cursor-pointer bg-black rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                     <span class="">Upload a file</span>
                                     <input id="file-upload" name="pictureWiki" type="file" class="sr-only">
                                 </label>
                                 <p class="pl-1 text-black">or drag and drop</p>
                             </div>
                             <p class="text-xs text-black">
                                 PNG, JPG, GIF up to 10MB
                             </p>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="flex justify-end mt-6">
                 <button
                     class="px-16 py-2 leading-5 text-black transition-colors duration-200 transform bg-gray-500 rounded-md hover:bg-gray-800 hover:text-white focus:outline-none focus:bg-gray-600">Save</button>
             </div>
         </form>
     </section>


 </body>

 </html>