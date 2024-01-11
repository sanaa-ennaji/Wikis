<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <style>
    body {
      background-color: #f4f4f4;
    }

    .sidebar {
      background-color: #8e44ad; /* Purple color */
      color: #fff;
      height: 100vh;
    }

    .logo {
      padding: 20px;
      text-align: center;
    }

    .logo img {
      width: 50px; 
      height: 50px; 
      border-radius: 50%;
    }

    .nav-link {
      color: #fff;
    }

    .nav-link i {
      margin-right: 10px;
    }

    .profile {
      padding: 20px;
      text-align: center;
      border-top: 1px solid #fff;
    }
    .btn{
      
        margin-top: 25rem;
    }
  </style>
</head>
<body>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-2 d-none d-md-block sidebar">
        <div class="logo">
          <img src="your-logo-image.jpg" alt="Logo">
        </div>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-users"></i> Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-book"></i> Wikis</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-folder"></i> Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-tags"></i> Tags</a>
          </li>
        </ul>
        <div class="profile">
          <!-- <p>Admin Name</p> -->
          <a href="#" class="btn btn-light"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
      </nav>

      <!-- Content -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <!-- Add your main content here -->
        <h2>Main Content</h2>
      </main>
    </div>
  </div>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
