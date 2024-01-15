<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/d0fb25e48c.js" crossorigin="anonymous"></script>

    <title>UpdateTag</title>
</head>

<body>
    <!--================form-add-Assurance================ -->
    <section class="max-w-4xl p-6 mx-auto bg-gray-200 rounded-md shadow-xl shadow-gray-300  mt-52">
        <h1 class="text-xl font-bold text-black capitalize dblack">update Tag</h1>
        <form action="../../../Controllers/TagController/updateTagController.php" method="POST"
            enctype="multipart/form-data">
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-black " for="nameTag">new Name</label>
                    <input id="nameTag" type="text" name="nameTag"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md     focus:outline-none focus:ring">
                </div>

            </div>

            <?php $idTag = $_GET['idTag']; ?>

            <input type="hidden" name="idTag" value="<?=$idTag?>">

            <div class="flex justify-end mt-6">
                <button
                    class="px-16 py-2 leading-5 text-black transition-colors duration-200 transform bg-gray-500 rounded-md hover:bg-gray-800 hover:text-white focus:outline-none focus:bg-gray-600">update</button>
            </div>
        </form>
    </section>


</body>

</html>