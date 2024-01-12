<?php
require_once '../services/UserService.php';

class UserController {
    private $userService;
  

    public function __construct() {
        $this->userService = new UserService();
    }

    public function registerUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate input (you can add more validation as needed)
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            if (empty($nom) || empty($email) || empty($pass)) {
                echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
                return;
            }

            // Hash the password
            $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

            // Call the user service to register the user
            $success = $this->userService->registerUser($nom, $email, $hashedPassword);

            if ($success) {
                echo json_encode(['status' => 'success', 'message' => 'User registered successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Registration failed']);
            }
        }
    }

    public function loginUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            if (empty($email) || empty($pass)) {
                echo json_encode(['status' => 'error', 'message' => 'Email and password are required']);
                return;
            }

         
            $user = $this->userService->loginUser($email, $pass);

            if ($user) {
               
                session_start();
                $_SESSION['user'] = $user;

                echo json_encode(['status' => 'success', 'message' => 'Login successful']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid email or password']);
            }
        }
    }

    

    public function getAllUsers() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $users = $this->userService->getAllUsers();
            echo json_encode(['data' => $users]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
        }
    }
}

$userController = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'register') {
            $userController->registerUser();
        } elseif ($_POST['action'] === 'login') {
            $userController->loginUser();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Action not specified']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['getAllUsers'])) {
        $userController->getAllUsers();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>