<?php
session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script  src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
          
        section{
            background-image:url(wallpaper.jpg) ;
         width: 100vw;
           height: 100vh;
            background-repeat: no-repeat;
          
        }
        
         </style>
</head>
<body>
<?php include 'navbar.php'; 

?>

<section class="bg-gray-50 dark:bg-gray-900">
  <div id="class" class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <img class="w-8 h-8 mr-2" src="w.png" alt="logo" width="200%">
          wikis
      </a>
      <div  id="class" class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div  id="class" class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Create Your account
              </h1>
              <!-- form -->
              <form class="space-y-4 md:space-y-6" action="../../controllers/userController/adduser.php" method="POST" >
              <div>
                      <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">full name</label>
                      <input type="text" id="fullName" name="fullName" placeholder="full name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>
                  <?php
    if (isset($_SESSION['error'])) {
        echo '<div class="text-red-500">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);
    }
    ?>
                  <div>
                      <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UserName</label>
                      <input type="text" name="username" id="username" placeholder="full name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>
                  <?php
                           
                            
                           if (isset($_SESSION['error2'])) {
                               echo '<div class="text-red-500">' . $_SESSION['error2'] . '</div>';
                               unset($_SESSION['error2']);
                           }
                           ?>
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@gmail.com" required>
                  </div>
                  <?php
                           
                            
                           if (isset($_SESSION['error3'])) {
                               echo '<div class="text-red-500">' . $_SESSION['error3'] . '</div>';
                               unset($_SESSION['error3']); // Effacer le message après l'affichage
                           }
                           ?>
                  <div>
                      <label for="pass" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password"  name="password" id="password" placeholder="********" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>
                
                  <!-- <input type="hidden" name="action" value="register"> -->
                  <button  id="btn" type="submit" class="w-full text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Register</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Already have an account? <a href="login.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                  </p>
                  <?php
                           
                            
                           if (isset($_SESSION['error'])) {
                               echo '<div class="text-red-500">' . $_SESSION['error'] . '</div>';
                               unset($_SESSION['error']);
                           }
                           ?>
              </form>
          </div>
      </div>
  </div>
</section>
<script>

tailwind.config = {
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
      }
    },
    fontFamily: {
      'body': [
    'Inter', 
    'ui-sans-serif', 
    'system-ui', 
    '-apple-system', 
    'system-ui', 
    'Segoe UI', 
    'Roboto', 
    'Helvetica Neue', 
    'Arial', 
    'Noto Sans', 
    'sans-serif', 
    'Apple Color Emoji', 
    'Segoe UI Emoji', 
    'Segoe UI Symbol', 
    'Noto Color Emoji'
  ],
      'sans': [
    'Inter', 
    'ui-sans-serif', 
    'system-ui', 
    '-apple-system', 
    'system-ui', 
    'Segoe UI', 
    'Roboto', 
    'Helvetica Neue', 
    'Arial', 
    'Noto Sans', 
    'sans-serif', 
    'Apple Color Emoji', 
    'Segoe UI Emoji', 
    'Segoe UI Symbol', 
    'Noto Color Emoji'
  ]
    }
  }
}
</script>
</body>
</html>
