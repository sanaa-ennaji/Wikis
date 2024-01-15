<?php

require_once '../../../Controllers/WikiController/displayWikiController.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ========== Tailwind Css ========  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ========== AwesomeFonts Css ========  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/d0fb25e48c.js" crossorigin="anonymous"></script>



</head>

<body>

    <section class=" flex items-center relative">

        <!-- =========== Aside bar =========== -->
        <aside class="bg-green-700 h-[100vh] w-[20%] sm:w-[320px] sm:p-5">
            <!-- ===== logo ===== -->

            <ul class="p-5 mt-10">

                <h2 class="text-base sm:text-2xl font-bold sm:my-5 text-white">
                    WIKI
                </h2>




                <li class="my-2">
                    <a href=""
                        class="text-lg font-medium w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-black bg-indigo-200 bg-opacity-20">
                        <img class="h-8 sm:w-8 w-full" src="../../../../public/images/wiki.png" alt=""><span
                            class="hidden sm:inline-block">Wikis</span></a>
                </li>
                <li> <a href=""
                        class="bg-[#B5CB99] h-10 w-[50%] sm:w-full flex justify-center items-center rounded-lg text-[#0F1A19] font-bold m-auto mt-10"><button
                            type="button"><i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180"></i></i> <span
                                class="hidden sm:inline-block">LOG
                                OUT</span></button></a></li>
            </ul>




        </aside>
        <!-- =========== Aside bar =========== -->

        <!-- =========== Content =========== -->
        <main class="bg-gray-100 flex-grow h-[100vh] relative">
            <!-- ============== header =========== -->

            <!--===========Content===========-->
            <main class="bg-gray-100 flex-grow h-[100vh] relative">
                <!-- ============== header =========== -->

                <!-- ============ Content ============= -->

                <div class="md:p-6 bg-white md:m-5">
                    <div class="flex items-center justify-between">
                        <div>

                        </div>

                        <div>


                            <button class="bg-green-700 text-white w-[160px] h-[50px] rounded-md" id="addBank">
                                <a href="addWiki.php">Add Wiki</a>
                            </button>
                        </div>
                    </div>

                    <!-- ========== table Banks-desktop ======== -->

                    <div class="hidden md:block  rounded-lg overflow-hidden mt-10">
                        <table class=" 
           w-full   " id="table1">
                            <thead class="  sm:w-full">
                                <tr class="bg-green-700 text-white h-[60px]">
                                    <th class="">ID</th>
                                    <th class="">title</th>
                                    <th class="">summarize</th>
                                    <th class="">content</th>
                                    <th class="">dateCreate</th>
                                    <th class="">dateModifie</th>
                                    <th class="">picture</th>
                                    <th class="">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="sm:w-full">

                                <?php 
              foreach($WikiDatas as $WikiData) {
              ?>
                                <tr class=" pt-10 sm:pt-0  w-full ">

                                    <td class=" sm:text-center text-right">
                                        <?php echo  $WikiData['idWiki'] ?>
                                    </td>
                                    <td class=" sm:text-center text-right">
                                        <?php echo $WikiData['title'] ?>
                                    </td>

                                    <td class=" sm:text-center text-right">
                                        <?php echo $WikiData['summarize'] ?>
                                    </td>
                                    <td class=" sm:text-center text-right">
                                        <?php echo $WikiData['content'] ?>
                                    </td>
                                    <td class=" sm:text-center text-right">
                                        <?php echo $WikiData['dateCreated'] ?>
                                    </td>
                                    <td class=" sm:text-center text-right">
                                        <?php echo $WikiData['dateModified'] ?>
                                    </td>
                                    <td class=" sm:text-center text-right">
                                        <div class="flex items-center justify-center">
                                            <?php
                                            $cheminImage = $WikiData['pictureWiki'] ;
                                            echo "<img class='w-[50px] h-[50px] ' src='$cheminImage' alt='image de categorie'>";
                                            ?>
                                        </div>
                                    </td>
                                    <td class=" sm:text-center text-right">
                                        <button class="bg-[#212529] text-white w-[35px] h-[35px] rounded-md">
                                            <a href="updateWiki.php?idWiki=<?= $WikiData['idWiki'];?>">
                                                <i class="fa-solid fa-pen " style="color:#186F65"></i></a>


                                        </button>
                                        <button class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md">
                                            <a
                                                href="../../../Controllers/WikiController/deleteWikiController.php?idWiki=<?= $WikiData['idWiki'];?>">
                                                <i class="fa-solid fa-trash "></i></a>

                                        </button>



                                    </td>

                                </tr>
                                <?php 
                                    }
                                    ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- ========== table Banks-mobile ======== -->
                    <div class="block sm:hidden rounded-lg overflow-hidden mt-10">
                        <table class=" block w-full  border-2 sm:border-0  " id="table2">
                            <thead class="hidden">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>


                                </tr>
                            </thead>
                            <tbody class="block  w-full">
                                <?php 
                foreach($WikiDatas as $WikiData) {
              ?>
                                <tr class="block pt-10 sm:pt-0   w-full ">

                                    <td data-label="id"
                                        class="border-b before:content-['id']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 sm:before:hidden sm:text-center block    text-right">
                                        <?php echo  $WikiData['idTag'] ?>
                                    </td>
                                    <td data-label="title" class="border-b before:content-['title'] before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                             text-right">
                                        <?php echo  $WikiData['title'] ?>
                                    </td>
                                    <td data-label="sammurize" class="border-b before:content-['sammurize'] before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                             text-right">
                                        <?php echo  $WikiData['summarize'] ?>
                                    </td>
                                    <td data-label="content" class="border-b before:content-['content'] before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                             text-right">
                                        <?php echo $WikiData['content'] ?>
                                    </td>
                                    <td data-label="picture" class="border-b before:content-['dateCreted'] before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                             text-right">
                                        <?php echo $WikiData['dateCreated'] ?>
                                    </td>
                                    <td data-label="picture" class="border-b before:content-['dateModified'] before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                             text-right">
                                        <?php echo $WikiData['dateModified'] ?>
                                    </td>
                                    <td data-label="picture" class="border-b before:content-['dateModified'] before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                             text-right">
                                        <div class="flex items-center justify-center">
                                            <?php
                                            $cheminImage = $WikiData['pictureWiki'] ;
                                            echo "<img class='w-[50px] h-[50px] ' src='$cheminImage' alt='image de categorie'>";
                                            ?>
                                        </div>
                                    </td>

                                    <td data-label="ACtion"
                                        class="border-b before:content-['action'] before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2  sm:before:hidden  sm:text-center block    text-right">
                                        <button class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md">
                                            <a href="updateWiki.php?idWiki=<?= $WikiData['idWiki'];;?>">
                                                <i class="fa-solid fa-pen"></i></a>

                                        </button>
                                        <button class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md">
                                            <a
                                                href="../../../Controllers/WikiController/deleteWikiController.php?idWiki=<?= $WikiData['idWiki'];;?>">
                                                <i class="fa-solid fa-trash "></i></a>

                                        </button>



                                    </td>

                                </tr>
                                <?php 
              }
              ?>

                            </tbody>
                        </table>
                    </div>



                </div>
                <!-- ============ Content ============= -->


            </main>
            <!-- ========== overlay ================= -->

            <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>

            <script>
            $(document).ready(function() {
                $('#table1').DataTable();

            });
            $(document).ready(function() {
                $('#table2').DataTable();

            });
            </script>


            </script>

</body>

</html>