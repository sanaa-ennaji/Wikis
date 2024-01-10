
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wikis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css">
    <style>
        body {
            width: 100vw;
            height: 100vh;
            background: rgb(34, 193, 195);
            background: linear-gradient(0deg, rgba(34, 193, 195, 1) 0%, rgba(226, 45, 253, 1) 100%);
           
.navbar {
    background-color: #FF69B4; 
    padding-bottom: 4px;
    padding-top: 15px;
}

.navbar-brand {
    color: #8A2BE2; 
    padding-top: 2px;
   font-style: bold;
    
}

.navbar-brand:hover {
    color: #800080; 
}

.navbar-dark .navbar-toggler-icon {
    background-color: #8A2BE2;
}

.navbar-toggler:focus,
.navbar-toggler:active {
    outline: none;
}

.navbar-nav .nav-link {
    color: #8A2BE2;
}
.navbar-nav .nav-link:hover {
    color: #800080;
}

.btn-login,
.btn-register {
    background-color: #800080;
    border-color: #800080;
    color: #FFFFFF;
}

.btn-login:hover,
.btn-register:hover {
    background-color: #4B0082; 
    border-color: #4B0082;
    color: #FFFFFF;

} 
   }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
    <img src="<?= URLROOT . 'public/img/w.png'?>" class="img-fluid" alt="Phone image"width="5%" >
        <a class="navbar-brand" href="#">Wikis</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item" class="input-group">
                    <form class="form-inline mr-5">
                        <input class="form-control mr-sm-2 " width="60" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </li>
                <li class="nav-item ml-5">
                    <button class="btn btn-login ml-2">Login</button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-register ml-2" data-toggle="modal" data-target="#registerModal">Register</button>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter your password">
                        </div>
                        <button type="submit" class="btn btn-register">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Your other scripts go here -->
    <script src="<?= URLROOT ?>js/wikis.js"></script>
</body>
</html>


















<?php
//  include APPROOT . '/views/incfilesClient/head.php' 
  ?>

 <?php  
//  include APPROOT .'/views/incfilesClient/navbar.php'  
 ?>   



 <?php  
//  include APPROOT .'/views/incfilesClient/footer.php'
   ?>  

