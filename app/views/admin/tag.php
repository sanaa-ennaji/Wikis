<?php

require_once '../../controllers/tagController/displayTag.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/d0fb25e48c.js" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>
    <script src="https://kit.fontawesome.com/d0fb25e48c.js" crossorigin="anonymous"></script>
   <style>
    nav{
        background-color: blueviolet;
        
    }
    main{
        position: absolute;
        right:  0rem;

    }
   </style>
</head>
<body>

<?php
include 'component/sidebar.php';
?>


<main class="bg-gray-100 flex-grow h-[100vh] w-[85vw] ">


    <div class="md:p-6 bg-white md:m-5">
        <div class="flex items-center justify-between">
            <div></div>
            <div>
                <button class="bg-purple-700 text-white w-[160px] h-[50px] rounded-md" id="addTagBtn">
                    Add Tag
                </button>
            </div>
        </div>

        <div class="hidden md:block rounded-lg overflow-hidden mt-10">
            <table class="w-full" id="table1">
                <thead class="sm:w-full">
                    <tr class="bg-purple-700 text-white h-[60px]">
                        <th class="">ID</th>
                        <th class="">Tag Name</th>
                        <th class="">Actions</th>
                    </tr>
                </thead>
                <tbody class="sm:w-full">
                    <?php foreach($TagDatas as $TagData) { ?>
                        <tr class="pt-10 sm:pt-0 w-full ">
                            <td class="sm:text-center text-right"><?php echo $TagData['idTag'] ?></td>
                            <td class="sm:text-center text-right"><?php echo $TagData['nameTag'] ?></td>
                            <td class="sm:text-center text-right">
                                <button class="bg-purple-800 text-white w-[35px] h-[35px] rounded-md">
                                    <a href="updateTag.php?idTag=<?=$TagData['idTag'];?>">
                                        <i class="fa-solid fa-pen " style="color:#186F65"></i>
                                    </a>
                                </button>
                                <button class="bg-purple-800 text-white w-[35px] h-[35px] rounded-md">
                                    <a href="../../Controllers/tagController/deleteTag.php?idTag=<?=$TagData['idTag'];?>">
                                        <i class="fa-solid fa-trash " style="color:#186F65"></i>
                                    </a>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- ========== table mobile ======== -->
        <div class="block sm:hidden rounded-lg  mt-10">
            <table class=" block w-full  border-2 sm:border-0  " id="table2">
                <thead class="hidden">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>


                    </tr>
                </thead>
                <tbody class="block  w-full">
                    <?php 
              foreach($TagDatas as $TagData){
              ?>
                    <tr class="block pt-10 sm:pt-0   w-full ">

                        <td data-label="id"
                            class="border-b before:content-['id']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 sm:before:hidden sm:text-center block    text-right">
                            <?php echo  $TagData['idTag'] ?>
                        </td>
                        <td data-label="name Tag" class="border-b before:content-['name Tag'] before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center text-right">
                        <?php echo  $TagData['nameTag'] ?>
                       </td>


                        <td data-label="ACtion"
                            class="border-b before:content-['action'] before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2  sm:before:hidden  sm:text-center block    text-right">
                            <button class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md">
                                <a href="updateTag.php?idTag=<?= $TagData['idTag'];?>">
                                    <i class="fa-solid fa-pen"></i></a>

                            </button>
                            <button class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md">
                            <a href="../../Controllers/tagController/deleteTag.php?idTag=<?=$TagData['idTag'];?>">
                            <i class="fa-solid fa-trash"></i></a>

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

        <!-- pop up   -->
    <div id="addTagPopup"  class="hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white w-[500px] p-8 rounded-lg">
                <h2 class="text-2xl font-bold mb-4">Add Tag</h2>
                <form action="../../controllers/tagController/addTag.php" method="POST">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tag Name</label>
                        <input id="nameTag" type="text" name="nameTag" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-purple-700 text-white px-4 py-2 rounded-md">Add</button>
                        <button type="button" id="closeAddTagPopup" class="bg-gray-400 text-gray-800 ml-2 px-4 py-2 rounded-md">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</main>

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
        $('#addTagBtn').on('click', function () {
            $('#addTagPopup').removeClass('hidden');
        });

        $('#closeAddTagPopup').on('click', function () {
            $('#addTagPopup').addClass('hidden');
        });
    });
</script>
</body>

</html>