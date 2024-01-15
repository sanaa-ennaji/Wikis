<?php
// require_once '../../sidebar.php';
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
        right:  2rem;

    }
   </style>
</head>
<body>

<nav class=" shadow-xl h-screen fixed top-0 left-0 min-w-[250px] py-6 font-[sans-serif] overflow-auto">
      <div class="relative flex flex-col h-full">
        <a href="javascript:void(0)" class="text-center"><img src="../w.png" alt="logo"  class='w-[60px] inline'/> <span>wikis</span>
        </a>
        <ul class="space-y-3 my-10 flex-1">
          <li>
            <a href="javascript:void(0)"
              class="text-sm flex items-center text-[#007bff] border-r-[5px] border-[#077bff] bg-gray-100 px-8 py-4 transition-all">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-4"
                viewBox="0 0 512 512">
                <path
                  d="M197.332 170.668h-160C16.746 170.668 0 153.922 0 133.332v-96C0 16.746 16.746 0 37.332 0h160c20.59 0 37.336 16.746 37.336 37.332v96c0 20.59-16.746 37.336-37.336 37.336zM37.332 32A5.336 5.336 0 0 0 32 37.332v96a5.337 5.337 0 0 0 5.332 5.336h160a5.338 5.338 0 0 0 5.336-5.336v-96A5.337 5.337 0 0 0 197.332 32zm160 480h-160C16.746 512 0 495.254 0 474.668v-224c0-20.59 16.746-37.336 37.332-37.336h160c20.59 0 37.336 16.746 37.336 37.336v224c0 20.586-16.746 37.332-37.336 37.332zm-160-266.668A5.337 5.337 0 0 0 32 250.668v224A5.336 5.336 0 0 0 37.332 480h160a5.337 5.337 0 0 0 5.336-5.332v-224a5.338 5.338 0 0 0-5.336-5.336zM474.668 512h-160c-20.59 0-37.336-16.746-37.336-37.332v-96c0-20.59 16.746-37.336 37.336-37.336h160c20.586 0 37.332 16.746 37.332 37.336v96C512 495.254 495.254 512 474.668 512zm-160-138.668a5.338 5.338 0 0 0-5.336 5.336v96a5.337 5.337 0 0 0 5.336 5.332h160a5.336 5.336 0 0 0 5.332-5.332v-96a5.337 5.337 0 0 0-5.332-5.336zm160-74.664h-160c-20.59 0-37.336-16.746-37.336-37.336v-224C277.332 16.746 294.078 0 314.668 0h160C495.254 0 512 16.746 512 37.332v224c0 20.59-16.746 37.336-37.332 37.336zM314.668 32a5.337 5.337 0 0 0-5.336 5.332v224a5.338 5.338 0 0 0 5.336 5.336h160a5.337 5.337 0 0 0 5.332-5.336v-224A5.336 5.336 0 0 0 474.668 32zm0 0"
                  data-original="#000000" />
              </svg>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
    <a href="category.php" class="text-[#333] text-sm flex items-center hover:text-[#007bff] hover:border-r-[5px] border-[#077bff] hover:bg-gray-100 px-8 py-4 transition-all">
        <i class="fas fa-list w-[18px] h-[18px] mr-4"></i>
        <span>Category</span>
    </a>
</li>
<li>
    <a href="javascript:void(0)" class="text-[#333] text-sm flex items-center hover:text-[#007bff] hover:border-r-[5px] border-[#077bff] hover:bg-gray-100 px-8 py-4 transition-all">
        <i class="fas fa-book w-[18px] h-[18px] mr-4"></i>
        <span>Wikis</span>
    </a>
</li>
<li>
    <a href="javascript:void(0)" class="text-[#333] text-sm flex items-center hover:text-[#007bff] hover:border-r-[5px] border-[#077bff] hover:bg-gray-100 px-8 py-4 transition-all">
        <i class="fas fa-tags w-[18px] h-[18px] mr-4"></i>
        <span>Tags</span>
    </a>
</li>
<li>
    <a href="javascript:void(0)" class="text-[#333] text-sm flex items-center hover:text-[#007bff] hover:border-r-[5px] border-[#077bff] hover:bg-gray-100 px-8 py-4 transition-all">
        <i class="fas fa-users w-[18px] h-[18px] mr-4"></i>
        <span>Users</span>
    </a>
</li>
<li>
    <a href="javascript:void(0)" class="text-[#333] text-sm flex items-center hover:text-[#007bff] hover:border-r-[5px] border-[#077bff] hover:bg-gray-100 px-8 py-4 transition-all">
        <i class="fas fa-archive w-[18px] h-[18px] mr-4"></i>
        <span>Archive</span>
    </a>
</li>
        </ul>
        <div class="flex flex-wrap items-center cursor-pointer border-t border-gray-200 px-4 py-4">
          <img src='https://readymadeui.com/profile.webp' class="w-9 h-9 rounded-full border-white" />
          <div class="ml-4">
            <p class="text-sm text-[#333]">admin</p>
            <p class="text-xs text-gray-400 mt-1">Active free account</p>
          </div>
        </div>
      </div>
    </nav>


<main class="bg-gray-100 flex-grow h-[100vh] w-[80vw] ">
  

    <div class="md:p-6 bg-white md:m-5">
        <div class="flex items-center justify-between">
            <div></div>
            <div>
                <button class="bg-purple-700 text-white w-[160px] h-[50px] rounded-md" id="addTagBtn">
                    Add Tag
                </button>
            </div>
        </div>

        <!-- ========== tabledesktop ======== -->

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
                                    <a href="../../../Controllers/TagController/deleteTagController.php?idTag=<?=$TagData['idTag'];?>">
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
        <div class="block sm:hidden rounded-lg overflow-hidden mt-10">
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
                                <a
                                    href="../../controllers/tagController/deleteTag.php?idTag=<?= $TagData['idTag'] ;?>"><i
                                        class="fa-solid fa-trash"></i></a>

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
    <div id="addTagPopup"  class="hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white w-[500px] p-8 rounded-lg">
                <h2 class="text-2xl font-bold mb-4">Add Tag</h2>
                <form action="addTag.php" method="POST">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tag Name</label>
                        <input type="text" name="name" class="mt-1 p-2 w-full border rounded-md">
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